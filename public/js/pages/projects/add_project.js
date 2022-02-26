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

const initBeneficiaries = () => {
    let beneficiariesArray = [];
    let beneficiaries = document.getElementById("stored_beneficiaries") && document.getElementById("stored_beneficiaries").value;
    if(beneficiaries) {
        beneficiariesArray = JSON.parse(beneficiaries);
        beneficiariesArray = beneficiariesArray.map(beneficiary => beneficiary.id);
    }

    let sponsors = document.querySelectorAll('.importedSponsorId');
    sponsors && sponsors.forEach(sponsor => {
        beneficiariesArray.push(sponsor.value);
    });

    if (beneficiariesArray && beneficiariesArray.length) {
        $("#beneficiaries").select2().select2("val", beneficiariesArray);
    }
}


$(document).ready(() => {
    $(".select2").select2();

    $('#date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    initBeneficiaries();
});
