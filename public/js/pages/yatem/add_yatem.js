let membersArray = [];
let deletedMemberId;
let yatemData;

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

const initLibraries = () => {
    $('.date.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $(".select2").select2();
}

const getLocalities = (city_id) => {
    $.ajax({
        type: 'get',
        url: `/api/getCityLocalities/${city_id}`,
        success: (data) => {
            let select = document.getElementById('locality_id');
            const yatem_locality_id = getCookie('yatem_locality_id');

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

            $("#locality_id").select2().select2("val", yatem_locality_id);

        }
    });
}

const initCity = () => {
    yatemData = document.getElementById('yatemData') && document.getElementById('yatemData').value;

    if (yatemData) {
        yatemData = JSON.parse(yatemData);
        let employeeCityId = yatemData.user_profile.city_id;

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

const initYatomReason = () => {
    let selected_yatom_reason = $("#yatom_reason").val();
    if (selected_yatom_reason === 'الأب') {
        $('.cause_mother_death').addClass('d-none');
        $('.cause_father_death').removeClass('d-none');
    } else if (selected_yatom_reason === 'الأم') {
        $('.cause_father_death').addClass('d-none');
        $('.cause_mother_death').removeClass('d-none');
    } else if (selected_yatom_reason === 'كلاهما') {
        $('.cause_father_death').removeClass('d-none');
        $('.cause_mother_death').removeClass('d-none');
    }

    $('#yatom_reason').on('change', function () {
        let selected_yatom_reason = $("#yatom_reason").val();

        if (selected_yatom_reason === 'الأب') {
            $('.cause_mother_death').addClass('d-none');
            $('.cause_father_death').removeClass('d-none');
        } else if (selected_yatom_reason === 'الأم') {
            $('.cause_father_death').addClass('d-none');
            $('.cause_mother_death').removeClass('d-none');
        } else if (selected_yatom_reason === 'كلاهما') {
            $('.cause_father_death').removeClass('d-none');
            $('.cause_mother_death').removeClass('d-none');
        }
    });
}

const initAcademicLevel = () => {
    let selected_academic_level = $("#academic_level").val();
    if (selected_academic_level != "null") {
        $('.form-group.school').removeClass('d-none');
    } else {
        $('.form-group.school').addClass('d-none');
    }

    $('#academic_level').on('change', function () {
        let selected_academic_level = $("#academic_level").val();
        if (selected_academic_level != 'null') {
            $('.form-group.school').removeClass('d-none');
        } else {
            $('.form-group.school').addClass('d-none');
        }
    });
}

const initAvg = () => {
    let selected_avg = $("#avg").val();
    if (selected_avg == 'ضعيف') {
        $(".form-group.failer_reason").removeClass("d-none");
    } else {
        $(".form-group.failer_reason").addClass("d-none");
    }

    $('#avg').on('change', function () {
        let selected_avg = $("#avg").val();
        if (selected_avg == 'ضعيف') {
            $(".form-group.failer_reason").removeClass("d-none");
        } else {
            $(".form-group.failer_reason").addClass("d-none");
        }
    });
}

const initProperty = () => {
    let selected_avg = $("#property").val();
    if (selected_avg == '1') {
        $(".form-group.property_details").removeClass("d-none");
        $(".form-group.property_evaluation").removeClass("d-none");
        $(".form-group.property_income").removeClass("d-none");
    } else {
        $(".form-group.property_details").addClass("d-none");
        $(".form-group.property_evaluation").addClass("d-none");
        $(".form-group.property_income").addClass("d-none");
    }

    $('#property').on('change', function () {
        let selected_avg = $("#property").val();
        if (selected_avg == '1') {
            $(".form-group.property_details").removeClass("d-none");
            $(".form-group.property_evaluation").removeClass("d-none");
            $(".form-group.property_income").removeClass("d-none");
        } else {
            $(".form-group.property_details").addClass("d-none");
            $(".form-group.property_evaluation").addClass("d-none");
            $(".form-group.property_income").addClass("d-none");
        }
    });
}

const initHelathNote = () => {
    let selected_case = $("#health_status").val();
    if (selected_case == '1') {
        $(".form-group.health_note").removeClass("d-none");
    } else {
        $(".form-group.health_note").addClass("d-none");
    }

    $('#health_status').on('change', function () {
        let selected_case = $("#health_status").val();
        if (selected_case !== 'جيدة') {
            $(".form-group.health_note").removeClass("d-none");
        } else {
            $(".form-group.health_note").addClass("d-none");
        }
    });
}

const initPsychologicalProblems = () => {
    let selected_avg = $("#psychological_problems").val();
    if (selected_avg == '1') {
        $(".form-group.psychological_decription").removeClass("d-none");
    } else {
        $(".form-group.psychological_decription").addClass("d-none");
    }

    $('#psychological_problems').on('change', function () {
        let selected_avg = $("#psychological_problems").val();
        if (selected_avg == '1') {
            $(".form-group.psychological_decription").removeClass("d-none");
        } else {
            $(".form-group.psychological_decription").addClass("d-none");
        }
    });
}

const initBodyProblems = () => {
    let selected_avg = $("#body_problem").val();
    if (selected_avg == '1') {
        $(".form-group.body_decription").removeClass("d-none");
    } else {
        $(".form-group.body_decription").addClass("d-none");
    }

    $('#body_problem').on('change', function () {
        let selected_avg = $("#body_problem").val();
        if (selected_avg == '1') {
            $(".form-group.body_decription").removeClass("d-none");
        } else {
            $(".form-group.body_decription").addClass("d-none");
        }
    });
}

const initTalents = () => {
    let selected_avg = $("#talents").val();
    if (selected_avg == '1') {
        $(".form-group.talents_decription").removeClass("d-none");
    } else {
        $(".form-group.talents_decription").addClass("d-none");
    }

    $('#talents').on('change', function () {
        let selected_avg = $("#talents").val();
        if (selected_avg == '1') {
            $(".form-group.talents_decription").removeClass("d-none");
        } else {
            $(".form-group.talents_decription").addClass("d-none");
        }
    });
}

const initHasUniversity = () => {
    let selected_avg = $("#has_university").val();
    if (selected_avg == '1') {
        $(".form-group.university_type").removeClass("d-none");
    } else {
        $(".form-group.university_type").addClass("d-none");
    }

    $('#has_university').on('change', function () {
        let selected_avg = $("#has_university").val();
        if (selected_avg == '1') {
            $(".form-group.university_type").removeClass("d-none");
        } else {
            $(".form-group.university_type").addClass("d-none");
        }
    });
}

const initYatemIncomeSource = () => {
    let incomeSource = document.getElementById("yatem_income_source") && document.getElementById("yatem_income_source").value;
    if (incomeSource && incomeSource.length) {
        $("#income_source").select2().select2("val", incomeSource.split(","));
    }
}

const checkRequired = (event) => {
    var $form = $('.add_yatem');
    if ($form.find('.required').filter(function () { return this.value === '' }).length > 0) {
        $('.required_fields').removeClass('d-none');
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

const disabledAllTabs = () => {
    let tabs = document.querySelectorAll('#add_yatem_tab .nav-link');
    tabs.forEach(tab => {
        $(tab).removeClass('active');
    });

    let tabsContent = document.querySelectorAll('#myTabContent .tab-pane');
    tabsContent.forEach(tab => {
        $(tab).removeClass('active');
        $(tab).removeClass('show');
    });
}

const goNext = (selector, currentTab) => {
    if (checkTabRequired(currentTab)) {
        go(selector);
    }
}

const go = (selector) => {
    disabledAllTabs();
    $(selector).addClass('active');
    let tabContentSelector = selector.substring(0, selector.length - 4);
    $(tabContentSelector).addClass('active show');
}

const goBack = (selector) => {
    disabledAllTabs();
    $(selector).removeClass('disabled');
    $(selector).click();
}

const initAddFather = () => {
    $('.father_accordion').on('click', () => {
        $(".father_accordion span").toggleClass('bx-rotate-180');
    });


    $('#add_father').on('click', function () {
        if (checkTabRequired('#parents #father_section')) {
            let yatem_id = $(this).closest("form").find("input[name='yatem_id']").val();
            let full_name = $(this).closest("form").find("input[name='father_full_name']").val();
            let idc = $(this).closest("form").find("input[name='father_idc']").val();
            let nationality = $(this).closest("form").find("input[name='father_nationality']").val();
            let birth_of_date = $(this).closest("form").find("input[name='father_birth_of_date']").val();
            let total_children = $(this).closest("form").find("input[name='father_total_children']").val();
            let dead = $("#father_dead").val();
            let daeth_date = $(this).closest("form").find("input[name='father_daeth_date']").val();
            let is_working = $('#father_is_working').val();
            let job = $(this).closest("form").find("input[name='father_job']").val();
            let total_income = $(this).closest("form").find("input[name='fahter_total_income']").val();
            let martial_status = $('#father_martial_status').val();
            let academic_degree = $('#father_academic_degree').val();
            let yatem_custody = $('#father_yatem_custody').val();
            let phone = $('#father_phone').val();
            let mobile_1 = $('#father_mobile_1').val();

            let data = {
                yatem_id,
                full_name,
                idc,
                nationality,
                birth_of_date,
                total_children,
                dead,
                daeth_date,
                is_working,
                job,
                total_income,
                martial_status,
                academic_degree,
                yatem_custody,
                phone,
                mobile_1
            };

            $.ajax({
                type: 'post',
                url: "/add-father",
                data: {
                    yatem_id,
                    full_name,
                    idc,
                    nationality,
                    birth_of_date,
                    total_children,
                    dead,
                    daeth_date,
                    is_working,
                    job,
                    total_income,
                    martial_status,
                    academic_degree,
                    yatem_custody,
                    phone,
                    mobile_1
                },
                success: (response) => {
                    toastr.success('تم حفظ تعديلات الأب بنجاح');
                    // window.location.href = '/aytams';
                },
                error: (error) => {
                    console.error(error);
                }
            });
        }
    });
}

const initFatherDead = () => {
    let father_dead = $("#father_dead").val();
    if (father_dead == '1') {
        $(".form-group.father_daeth_date").removeClass("d-none");
    } else {
        $(".form-group.father_daeth_date").addClass("d-none");
    }

    $('#father_dead').on('change', function () {
        let father_dead = $("#father_dead").val();
        if (father_dead == '1') {
            $(".form-group.father_daeth_date").removeClass("d-none");
        } else {
            $(".form-group.father_daeth_date").addClass("d-none");
        }
    });
}

const initFatherJob = () => {
    let father_is_working = $("#father_is_working").val();
    if (father_is_working == '1') {
        $(".form-group.father_job").removeClass("d-none");
        $(".form-group.father_total_income").removeClass("d-none");
    } else {
        $(".form-group.father_job").addClass("d-none");
        $(".form-group.father_total_income").addClass("d-none");
    }

    $('#father_is_working').on('change', function () {
        let father_is_working = $("#father_is_working").val();
        if (father_is_working == '1') {
            $(".form-group.father_job").removeClass("d-none");
            $(".form-group.father_total_income").removeClass("d-none");
        } else {
            $(".form-group.father_job").addClass("d-none");
            $(".form-group.father_total_income").addClass("d-none");
        }
    });
}

const initAddMother = () => {
    $('.mother_accordion').on('click', () => {
        $(".mother_accordion span").toggleClass('bx-rotate-180');
    });


    $('#add_mother').on('click', function () {
        if (checkTabRequired('#parents #mother_section')) {
            let yatem_id = $(this).closest("form").find("input[name='yatem_id']").val();
            let full_name = $(this).closest("form").find("input[name='mother_full_name']").val();
            let idc = $(this).closest("form").find("input[name='mother_idc']").val();
            let nationality = $(this).closest("form").find("input[name='mother_nationality']").val();
            let birth_of_date = $(this).closest("form").find("input[name='mother_birth_of_date']").val();
            let total_children = $(this).closest("form").find("input[name='mother_total_children']").val();
            let dead = $("#mother_dead").val();
            let daeth_date = $(this).closest("form").find("input[name='mother_daeth_date']").val();
            let is_working = $('#mother_is_working').val();
            let job = $(this).closest("form").find("input[name='mother_job']").val();
            let total_income = $(this).closest("form").find("input[name='fahter_total_income']").val();
            let martial_status = $('#mother_martial_status').val();
            let academic_degree = $('#mother_academic_degree').val();
            let yatem_custody = $('#mother_yatem_custody').val();
            let phone = $('#mother_phone').val();
            let mobile_1 = $('#mother_mobile_1').val();

            let data = {
                yatem_id,
                full_name,
                idc,
                nationality,
                birth_of_date,
                total_children,
                dead,
                daeth_date,
                is_working,
                job,
                total_income,
                martial_status,
                academic_degree,
                yatem_custody,
                phone,
                mobile_1
            };

            $.ajax({
                type: 'post',
                url: "/add-mother",
                data: {
                    yatem_id,
                    full_name,
                    idc,
                    nationality,
                    birth_of_date,
                    total_children,
                    dead,
                    daeth_date,
                    is_working,
                    job,
                    total_income,
                    martial_status,
                    academic_degree,
                    yatem_custody,
                    phone,
                    mobile_1
                },
                success: (response) => {
                    toastr.success('تم حفظ تعديلات الأم بنجاح');
                    // window.location.href = '/aytams';
                },
                error: (error) => {
                    console.error(error);
                }
            });
        }
    });
}

const initMotherDead = () => {
    let mother_dead = $("#mother_dead").val();
    if (mother_dead == '1') {
        $(".form-group.mother_daeth_date").removeClass("d-none");
    } else {
        $(".form-group.mother_daeth_date").addClass("d-none");
    }

    $('#mother_dead').on('change', function () {
        let mother_dead = $("#mother_dead").val();
        if (mother_dead == '1') {
            $(".form-group.mother_daeth_date").removeClass("d-none");
        } else {
            $(".form-group.mother_daeth_date").addClass("d-none");
        }
    });
}

const initMotherJob = () => {
    let mother_is_working = $("#mother_is_working").val();
    if (mother_is_working == '1') {
        $(".form-group.mother_job").removeClass("d-none");
        $(".form-group.mother_total_income").removeClass("d-none");
    } else {
        $(".form-group.mother_job").addClass("d-none");
        $(".form-group.mother_total_income").addClass("d-none");
    }

    $('#mother_is_working').on('change', function () {
        let mother_is_working = $("#mother_is_working").val();
        if (mother_is_working == '1') {
            $(".form-group.mother_job").removeClass("d-none");
            $(".form-group.mother_total_income").removeClass("d-none");
        } else {
            $(".form-group.mother_job").addClass("d-none");
            $(".form-group.mother_total_income").addClass("d-none");
        }
    });
}

const importFatherInfo = () => {
    const yatem_id = document.getElementById('yatem_id').value;

    if (yatem_id) {
        $.ajax({
            type: 'GET',
            url: `/get-yatem-father/${yatem_id}`,
            success: (response) => {
                $('.father-not-found').hide();
                $('.mother-not-found').hide();

                fillGuardianInfo(response, 'father');
            },
            error: (error) => {
                if (error.status === 406) {
                    $('.father-not-found').show();
                }
            }
        })
    }
}

const importMotherInfo = () => {
    const yatem_id = document.getElementById('yatem_id').value;

    if (yatem_id) {
        $.ajax({
            type: 'GET',
            url: `/get-yatem-mother/${yatem_id}`,
            success: (response) => {
                $('.mother-not-found').hide();
                $('.father-not-found').hide();

                fillGuardianInfo(response, 'mother');

            },
            error: (error) => {
                if (error.status === 406) {
                    $('.mother-not-found').show();
                }
            }
        })
    }
}

const fillGuardianInfo = (info, relation) => {
    document.getElementById('guardian_full_name').value = info.full_name;
    document.getElementById('guardian_idc').value = info.idc;
    document.getElementById('guardian_nationality').value = info.nationality;
    document.getElementById('guardian_birth_of_date').value = info.birth_of_date;
    document.getElementById('guardian_total_children').value = info.total_children;
    document.getElementById('guardian_job').value = info.job;
    document.getElementById('guardian_total_income').value = info.total_income;

    if (relation === 'father') {
        $('#guardian_relation').val('الأب');
        $('#guardian_relation').trigger('change');

        $('#guardian_gender').val('1');
        $('#guardian_gender').trigger('change');
    }
    else if (relation === 'mother') {
        $('#guardian_relation').val('الأم');
        $('#guardian_relation').trigger('change');

        $('#guardian_gender').val('0');
        $('#guardian_gender').trigger('change');
    }
}

const initAddGuardian = () => {
    $('#add_guardian').on('click', function () {
        if (checkTabRequired('#guardians #add_guardian_form')) {
            let yatem_id = $(this).closest("form").find("input[name='yatem_id']").val();
            let full_name = $(this).closest("form").find("input[name='guardian_full_name']").val();
            let idc = $(this).closest("form").find("input[name='guardian_idc']").val();
            let nationality = $(this).closest("form").find("input[name='guardian_nationality']").val();
            let birth_of_date = $(this).closest("form").find("input[name='guardian_birth_of_date']").val();
            let place_of_birth = $(this).closest("form").find("input[name='guardian_place_of_birth']").val();
            let total_children = $(this).closest("form").find("input[name='guardian_total_children']").val();
            let job = $(this).closest("form").find("input[name='guardian_job']").val();
            let total_income = $(this).closest("form").find("input[name='guardian_total_income']").val();
            let account_number = $(this).closest("form").find("input[name='guardian_account_number']").val();
            let deposits_type = $(this).closest("form").find("input[name='guardian_deposits_type']").val();
            let iban = $(this).closest("form").find("input[name='guardian_iban']").val();

            let academic_degree = $('#guardian_academic_degree').val();
            let gender = $('#guardian_gender').val();
            let relation = $('#guardian_relation').val();
            let deposits = $('#guardian_deposits').val();
            let need_job = $('#guardian_need_job').val();

            let data = {
                yatem_id,
                full_name,
                idc,
                nationality,
                birth_of_date,
                place_of_birth,
                total_children,
                job,
                total_income,
                account_number,
                deposits,
                academic_degree,
                gender,
                relation,
                deposits_type,
                need_job,
                iban
            };

            $.ajax({
                type: 'post',
                url: "/add-guardian",
                data: {
                    yatem_id,
                    full_name,
                    idc,
                    nationality,
                    gender,
                    birth_of_date,
                    place_of_birth,
                    total_children,
                    academic_degree,

                    job,
                    total_income,
                    deposits,
                    deposits_type,
                    relation,
                    need_job,
                    account_number,
                    iban
                },
                success: (response) => {
                    toastr.success('تم حفظ تعديلات الأوصياء بنجاح');
                    // window.location.href = '/aytams';
                },
                error: (error) => {
                    console.error(error);
                }
            });
        }
    });
}

const initAddFamilyMember = () => {
    $('#clear_family_member').on('click', () => {
        document.getElementById('family_member_id').value = '';
        document.getElementById('family_member_full_name').value = '';
        document.getElementById('family_member_birth_of_date').value = '';
        document.getElementById('family_member_school').value = '';

        $("#family_member_academic_level").select2().select2("val", '');
        $("#family_member_relationship").select2().select2("val", '');

        $('.family_member_accordion').click();
    });

    $('#add_family_member').on('click', function () {
        if (checkTabRequired('#family_member_section #add_family_member_form')) {
            let yatem_id = $(this).closest("form").find("input[name='yatem_id']").val();
            let family_member_id = $(this).closest("form").find("input[name='family_member_id']").val();
            let full_name = $(this).closest("form").find("input[name='family_member_full_name']").val();
            let birth_of_date = $(this).closest("form").find("input[name='family_member_birth_of_date']").val();
            let school = $(this).closest("form").find("input[name='family_member_school']").val();

            let academic_level = $('#family_member_academic_level').val();
            let relationship = $('#family_member_relationship').val();

            let data = {
                yatem_id,
                family_member_id,
                full_name,
                birth_of_date,
                school,
                academic_level,
                relationship
            };

            $.ajax({
                type: 'post',
                url: "/add_family_member",
                data: {
                    yatem_id,
                    family_member_id,
                    full_name,
                    birth_of_date,
                    school,
                    academic_level,
                    relationship
                },
                success: (response) => {
                    toastr.success('تم حفظ تعديلات الأقرباء بنجاح');
                    getFamilyMembersList();
                    // window.location.href = '/aytams';
                },
                error: (error) => {
                    console.error(error);
                }
            });
        }
    });
}

const memberClicked = (e) => {
    const id = e.target.id;
    const member = membersArray[id];

    document.getElementById('family_member_id').value = member.id;
    document.getElementById('family_member_full_name').value = member.full_name;
    document.getElementById('family_member_birth_of_date').value = member.birth_of_date;
    document.getElementById('family_member_school').value = member.school;

    $("#family_member_academic_level").select2().select2("val", member.academic_level);
    $("#family_member_relationship").select2().select2("val", member.relationship);

    if (!$('.accordion-content').hasClass('show')) {
        $('.family_member_accordion').click();
    }

}

const initDeleteMember = () => {
    $('#confirmDeleteMember').on('show.bs.modal', function (e) {
        deletedMemberId = $(e.relatedTarget).data('id');
    });

    $('.confirmDeleteMemberForm').submit(
        function (e) {
            $('#confirmDeleteMember').modal('hide');
            $.ajax({
                type: 'post',
                url: `/delete_member/${deletedMemberId}`,
                success: (response) => {
                    toastr.success('تم حذف القريب بنجاح');
                    getFamilyMembersList();
                },
                error: (error) => {
                    console.error(error);
                }
            });
            e.preventDefault();
        }
    );
}

const renderFamilyMembers = (members) => {
    membersArray = members;
    if (members.length > 0) {
        $('#no_family_members').hide();

        $('#family_members_table .body').empty();

        let tableBody = document.getElementById('family_members_table_body');

        members.forEach((member, index) => {
            let new_row = document.createElement('li');

            let full_name = document.createElement('a');
            full_name.setAttribute('id', index);
            full_name.onclick = memberClicked;
            full_name.setAttribute('class', 'full_name');
            full_name.setAttribute('href', '#');
            full_name.appendChild(document.createTextNode(member.full_name));
            new_row.appendChild(full_name);

            let relationship = document.createElement('span');
            relationship.appendChild(document.createTextNode(member.relationship));
            new_row.appendChild(relationship);

            let school = document.createElement('span');
            school.appendChild(document.createTextNode(member.school));
            new_row.appendChild(school);

            let academic_level = document.createElement('span');
            academic_level.appendChild(document.createTextNode(member.academic_level));
            new_row.appendChild(academic_level);

            let birth_of_date = document.createElement('span');
            birth_of_date.appendChild(document.createTextNode(member.birth_of_date));
            new_row.appendChild(birth_of_date);


            let deleteSpan = document.createElement("span");
            deleteSpan.setAttribute("class", "actions_cell text-center");

            let deleteIcon = document.createElement("i");
            deleteIcon.setAttribute("class", "bx bx-trash");
            deleteIcon.setAttribute("title", "حذف القريب");
            deleteIcon.setAttribute('id', member.id);

            deleteIcon.setAttribute('data-toggle', 'modal');
            deleteIcon.setAttribute('data-target', '#confirmDeleteMember');
            deleteIcon.setAttribute('data-id', member.id);

            deleteSpan.appendChild(deleteIcon);
            new_row.appendChild(deleteSpan);

            tableBody.appendChild(new_row);
        });
    } else {
        $('#family_members_table').hide();
        $('#no_family_members').show();
    }

}

const getFamilyMembersList = () => {
    const yatem_id = document.getElementById('yatem_id') && document.getElementById('yatem_id').value;

    if (yatem_id) {
        $.ajax({
            type: 'GET',
            url: `/get_family_members_list?yatem_id=${yatem_id}`,
            success: (response) => {
                renderFamilyMembers(response);
            },
            error: (error) => {
                console.error(error);
            }
        });
    }
}

const initTabs = () => {
    $('#profile-tab').on('click', (event) => {
        go('#profile-tab');
    });

    $('#details-tab').on('click', (event) => {
        goNext('#details-tab', '#profile');
    });

    $('#references-tab').on('click', (event) => {
        if (checkTabRequired('#profile')) {
            goNext('#references-tab', '#details-tab');
        }
    });
}

const initAttachments = () => {
    $('#fileUploadForm').ajaxForm({
        beforeSend: function () {
            var percentage = '0';
            $('#progress_bar').show();
        },
        uploadProgress: function (event, position, total, percentComplete) {
            var percentage = percentComplete;
            $('#file_uplode_btn').hide();
            $('.progress .progress-bar').css("width", percentage + '%', function () {
                return $(this).attr("aria-valuenow", percentage) + "%";
            })
        },
        complete: function (xhr) {
            document.getElementById("fileUploadForm").reset();
            $('#progress_bar').hide();
            $('#file_uplode_btn').show();
        },
        success: (response) => {
            toastr.success(response.message);
            $('#attachmentView').html(response.attachmentView)
        },
        error: (error) => {
            toastr.error(error.responseJSON.errors);
        }
    });
}

$(document).ready(() => {
    initLibraries();
    initYatomReason();
    initAcademicLevel();
    initAvg();
    initProperty();
    initPsychologicalProblems();
    initHelathNote();
    initBodyProblems();
    initTalents();
    initHasUniversity();
    initYatemIncomeSource();
    initAddFather();
    initFatherDead();
    initFatherJob();
    initAddMother();
    initMotherDead();
    initMotherJob();
    initAddGuardian();
    initAddFamilyMember();
    getCities();
    getFamilyMembersList();
    initDeleteMember();
    initTabs();

    $('#attachment-tab').click(() => {
       initAttachments();
    })
});