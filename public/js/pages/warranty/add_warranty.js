selectedAytams = [];
selectedYatemsIds = [];

initLibraries = () => {
    $(".select2").select2();
    $('.date.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm",
        viewMode: "months",
        minViewMode: "months"
    });
}

renderSelectedAytamsList = () => {
    $('.children-names').empty();

    let list = document.getElementById('children-names');

    selectedAytams.forEach((yatem, index) => {
        let new_row = document.createElement('li');

        let full_name = document.createElement('span');
        full_name.appendChild(document.createTextNode(yatem.full_name));
        new_row.appendChild(full_name);

        let div = document.createElement('div');
        let i = document.createElement('i');
        i.setAttribute('class', 'bx bx-x remove_selected_yatem');
        i.setAttribute('data-id', yatem.id);
        div.appendChild(i);
        new_row.appendChild(div);

        list.appendChild(new_row);
    });

    $('.remove_selected_yatem').on('click', event => {
        let id = $(event.target).attr('data-id');
        if (id) {
            id = parseInt(id);
            let index = selectedAytams.map(item => item.id).indexOf(id);
            selectedAytams.splice(index, 1);
            renderSelectedAytamsList();
        }

    });
}

getAytams = (yatemName = null) => {
    $("#yatem_name").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/getAytamsList",
                type: 'POST',
                dataType: "json",
                data: {
                    yatemName
                },
                success: function (data) {
                    response($.map(data, function (yatem) {
                        return {
                            label: yatem.full_name,
                            value: yatem.id
                        };
                    }));
                }
            });
        },
        minLength: 0,
        select: function (event, ui) {
            let index = selectedAytams.map(item => item.id).indexOf(ui.item.value);
            if (index === -1) {
                selectedAytams.push({
                    full_name: ui.item.label,
                    id: ui.item.value
                });
            }

            renderSelectedAytamsList();
            setTimeout(() => {
                document.getElementById('yatem_name').value = "";
                document.getElementById('yatem_name').blur();
            });
        }
    }).focus(function () {
        $(this).data("uiAutocomplete").search($(this).val());
    });
}

search = (yatemName = null) => {
    getAytams(yatemName);
}

initAutoComplete = () => {
    getAytams();

    // $.ajax({
    //     type: 'POST',
    //     url: `/getAytamsList/`,
    //     success: (response) => {
    //         let aytamsList = response.map(yatem => yatem.full_name);

    //         $("#yatem_name").autocomplete({
    //             source: aytamsList,
    //             minLength: 0,
    //             select: function (event, ui) {
    //                 console.log(ui.item);
    //             }
    //         }).focus(function(){            
    //             $(this).data("uiAutocomplete").search($(this).val());
    //         });
    //     }
    // });

}

initSelectedAytams = () => {
    let selectedPassesAytams = document.getElementById('selected_aytams') && document.getElementById('selected_aytams').value;
    if (selectedPassesAytams) {
        selectedPassesAytams = JSON.parse(selectedPassesAytams);
        selectedAytams = selectedPassesAytams;
        renderSelectedAytamsList();
    }
}

checkWarrantyTabRequired = (currentTab) => {
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

monthDiff = (d1, d2) => {
    var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}

getFormatedDate = (date) => {
    let month = date.getMonth() + 1;
    if (month <= 9) {
        month = "0" + month;
    }

    let year = date.getFullYear();
    let newDate = year + "-" + month;

    return newDate;
}

renderWarrantyDetails = (numberOfMonths, from, amountValue) => {
    let fromDate = new Date(from);
    let monthsArray = [getFormatedDate(fromDate)];

    for (let i = 1; i <= numberOfMonths; i++) {
        let newDate = new Date(fromDate.setMonth(fromDate.getMonth() + 1));
        monthsArray.push(getFormatedDate(newDate));
    }

    $('#warranty_table .body').empty();

    let tableBody = document.getElementById('warranty_table_body');

    for (let i = 0; i <= numberOfMonths; i++) {
        let new_row = document.createElement('li');

        let number = document.createElement('span');
        number.appendChild(document.createTextNode(i + 1));
        new_row.appendChild(number);

        let month = document.createElement('span');
        month.appendChild(document.createTextNode(monthsArray[i]));
        new_row.appendChild(month);

        let amount = document.createElement('span');
        amount.appendChild(document.createTextNode(amountValue));
        new_row.appendChild(amount);

        tableBody.appendChild(new_row);
    }

    $('#warranty_table').show();
}

checkIfExist = () => {
    $.ajax({
        type: 'POST',
        url: '/warranties/check-if-exist/',
        data: {
            yatemsIds: selectedYatemsIds
        },
        success: res => {
            if (res === 'false') {
                continueAddWarranty();
                $('#yatem_already_exist').hide();
            } else {
                showAlreadyExist();
            }
        },
        error: err => {
            console.error(err);
        }
    });
}

continueAddWarranty = () => {
    let sponsor_id = $('#sponsor_name').val();
    let amount = $('#amount').val();
    let from_date = $('#from_date').val();
    let to_date = $('#to_date').val();

    amount = parseInt(amount);
    amount = amount / selectedYatemsIds.length;

    if (amount < parseInt($("#MIN_WARRANTY_AMOUNT").val())) {
        $('#amount_not_enough').show();
        return;
    } else {
        $('#amount_not_enough').hide();
    }

    let from = new Date(from_date);
    let to = new Date(to_date);

    let numberOfMonths = monthDiff(from, to);

    let data = {
        selectedYatems: selectedYatemsIds,
        sponsor_id,
        amount,
        from_date,
        to_date,
        numberOfMonths
    };

    $.ajax({
        type: 'post',
        url: "/add_warranty",
        data: {
            selectedYatems: selectedYatemsIds,
            sponsor_id,
            amount,
            from_date,
            to_date
        },
        success: (response) => {
            $('#yatem_already_exist').hide();
            $('#add_warranty').hide();
            toastr.success('تم إضافة الكفالة بنجاح');
            renderWarrantyDetails(numberOfMonths, from, amount * selectedYatemsIds.length);
        },
        error: (error) => {
            console.error(error);
        }
    });
}

showAlreadyExist = () => {
    $('#yatem_already_exist').show();
}

initAddWarranty = () => {
    $('#add_warranty').on('click', async () => {
        let selectedYatems = selectedAytams.map(item => item.id);
        selectedYatemsIds = selectedYatems;

        if (selectedYatemsIds.length === 0) {
            $('#no_yatem_selected').show();
            return;
        }
        else {
            $('#no_yatem_selected').hide();
        }

        if (checkWarrantyTabRequired('.add_warranty-section .left-card')) {
            await checkIfExist();
        }
    });
}

reload = () => {
    window.location.reload();
}

$(document).ready(() => {
    initLibraries();
    initAddWarranty();
    initAutoComplete();
    initSelectedAytams();
});