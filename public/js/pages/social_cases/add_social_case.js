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

const initLibraries = () => {
    $('.date.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $(".select2").select2();
}

const initAddSocialCase = () => {
    $('#add_guardian').on('click', function () {
        if (checkTabRequired('#add_social_case_form')) {
            $('#add_social_case_form').submit();
        }
    });
}

$(document).ready(() => {
    initLibraries();
    initAddSocialCase();
});