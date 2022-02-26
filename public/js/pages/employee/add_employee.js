let employeeData;

const move = () => {
    if(checkTabRequired("#addEmployeeForm")) {
        $('#addEmployeeForm').toggleClass('show-account');
        $('#addEmployeeForm').toggleClass('hide-account');
    }
}

const checkTabRequired = (currentTab) => {
    var $form = $(currentTab);
    let requeiredFields = $form.find('.required');
    isTabValid = false;

    if ($form.find('.required').filter(function () { return (this.value === '' || this.value === 'null') }).length > 0) {
        isTabValid = false;
    } else {
        isTabValid = true;
    }

    for (let i = 0; i < requeiredFields.length; i++) {
        if (requeiredFields[i].value === '' || requeiredFields[i].value === 'null') {
            $(requeiredFields[i]).parent().addClass('required_errors');
        } else {
            $(requeiredFields[i]).parent().removeClass('required_errors');
        }
    }

    return isTabValid;
}

const getCookie = (name) => {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

const getLocalities = (city_id) => {
    $.ajax({
        type: 'get',
        url: `/api/getCityLocalities/${city_id}`,
        success: (data) => {
            let select = document.getElementById('locality_id');
            const employee_locality_id = getCookie('employee_locality_id');

            // empty old data
            $('#locality_id').find('option').remove();

            if (data.length > 0) {
                let opt = document.createElement('option');
                opt.value = null;
                opt.innerHTML = '';
                opt.disabled = true;
                select.appendChild(opt);

                data.forEach((locality, index) => {
                    let opt = document.createElement('option');
                    opt.value = locality.id;
                    opt.innerHTML = locality.locality_name;

                    select.appendChild(opt);
                });
            }

            $("#locality_id").select2().select2("val", employee_locality_id);

        }
    });
}

const initCity = () => {
    employeeData = document.getElementById('employeeData') && document.getElementById('employeeData').value;

    if (employeeData) {
        employeeData = JSON.parse(employeeData);
        let employeeCityId = employeeData.user_profile.city_id;

        if (employeeCityId) {
            $("#city").select2().select2("val", employeeCityId);
        }
    }
}

const getCities = () => {
    showLoading();

    $.ajax({
        type: 'GET',
        url: `/api/cities/${1}`,
        success: res => {
            renderCities(res);
            hideLoading();
        },
        error: err => {
            console.log(err);
            hideLoading();
        }
    });
}

const renderCities = (cities) => {
    let citySelect = document.getElementById('city');

    $('#city')
        .find('option')
        .remove();

    cities.forEach((city, index) => {
        let option = document.createElement('option');
        option.innerHTML = city.name;
        option.value = city.id;

        citySelect.appendChild(option);
    });

    $("#city").select2();

    $('#city').on('change', function () {
        let selected_city_id = $("#city").val();
        getLocalities(selected_city_id);
    });

    getLocalities(cities[0].id);

    initCity();

}

$(document).ready(() => {
    $('#birth_of_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $(".select2").select2();

    getCities();
});
