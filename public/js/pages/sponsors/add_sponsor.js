let sponsorData;

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

    if(isTabValid) {
        $(currentTab).submit();
    }
}

const initSponsorType = () => {
    let selected_sponsor_type = $("#sponsor_type").val();

    if (selected_sponsor_type === 'جماعية') {
        $('.is_international').removeClass('d-none');
        $('.contact_person').removeClass('d-none');
    }
    else if (selected_sponsor_type === 'فردية') {
        $('.is_international').addClass('d-none');
        $('.contact_person').addClass('d-none');
    }

    $('#sponsor_type').on('change', function () {
        let selected_sponsor_type = $("#sponsor_type").val();

        if (selected_sponsor_type === 'جماعية') {
            $('.is_international').removeClass('d-none');
            $('.contact_person').removeClass('d-none');
        }
        else if (selected_sponsor_type === 'فردية') {
            $('.is_international').addClass('d-none');
            $('.contact_person').addClass('d-none');
        }
    });
}

const getCountries = () => {
    showLoading();
    $.ajax({
        type: 'GET',
        url: '/api/countries',
        success: res => {
            renderCountries(res);
            hideLoading();
        },
        error: err => {
            console.log(err);
            hideLoading();
        }
    });
}

const renderCountries = (countries) => {
    let countrySelect = document.getElementById('country_id');

    $('#country_id')
        .find('option')
        .remove();

        countries.forEach((country, index) => {
        let option = document.createElement('option');
        option.innerHTML = country.name;
        option.value = country.id;

        countrySelect.appendChild(option);
    });

    $("#country_id").select2();

    $('#country_id').on('change', function () {
        let selected_country_id = $("#country_id").val();
        getCities(selected_country_id);
    });

    getCities(countries[0].id);

    initCountry();
}

const initCountry = () => {
    sponsorData = document.getElementById('sponsorData') && document.getElementById('sponsorData').value;

    if (sponsorData) {
        sponsorData = JSON.parse(sponsorData);
        let customerCityId = sponsorData.country;

        if (customerCityId) {
            $("#country_id").select2().select2("val", customerCityId);
        }
    }
}

const getCities = (countryId) => {
    showLoading();

    $.ajax({
        type: 'GET',
        url: `/api/cities/${countryId}`,
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
    let citySelect = document.getElementById('city_id');

    $('#city_id')
        .find('option')
        .remove();

    cities.forEach((city, index) => {
        let option = document.createElement('option');
        option.innerHTML = city.name;
        option.value = city.id;

        citySelect.appendChild(option);
    });

    $("#city_id").select2();


    let sponsorCityId = sponsorData && sponsorData.city;

    if (sponsorCityId) {
        $("#city_id").select2().select2("val", sponsorCityId);
    }
}

$(document).ready(() => {
    $(".select2").select2();
    
    initSponsorType();
    getCountries();
});