<div class="accordion mt-4">
    <div class="mother_accordion accordion-header" data-toggle="collapse" data-target="#mother_section"
         aria-expanded="false" aria-controls="mother_section">
        <label class="accordion-title">اضافة معلومات فستان السهرة</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="mother_section">
        <div class="">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_name">{{ __('اسم الفستان') }}</label>
                        <select name="party_name" data-model="Party" class="form-control" id="party_search">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_code"><span class="required_lbl">*</span>{{ __('كود الفستان') }}</label>
                        <input id="party_code" type="text"
                               class="form-control required @error('party_code') is-invalid @enderror" name="party_code"
                               value="{{ old('party_code') }}" autocomplete="party_code" maxlength="10">

                        @error('party_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_model"><span class="required_lbl">*</span>{{ __('موديل الفستان') }}</label>
                        <select class="js-example-basic-single" name="party_model" id="party_model">
                            <option value="" id=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_price"><span class="required_lbl">*</span>{{ __('سعر') }}</label>
                        <input id="party_price" type="text"
                               class="form-control @error('party_price') is-invalid @enderror"
                               name="party_price"
                               value="{{ old('party_price') }}"
                               autocomplete="party_price" maxlength="10">

                        @error('party_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_size"><span class="required_lbl">*</span>{{ __('الحجم') }}</label>
                        <select class="js-example-basic-single" name="party_size" id="party_size">
                            <option value="" id=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                        <select class="js-example-basic-single" name="party_color" id="party_color">
                            <option value="" id=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">

                <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                           aria-controls="parents" aria-selected="true">اضافة معلومات للاكسسوار</a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_name_acc">{{ __('اسم الاكسسوار') }}</label>
                        <select name="party_name_acc" data-model="Accessory" class="form-control" id="party_name_acc">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="party_code_acc"><span class="required_lbl">*</span>{{ __('كود الاكسسوار') }}</label>
                        <input id="party_code_acc" type="text"
                               class="form-control required @error('party_code_acc') is-invalid @enderror"
                               name="party_code_acc"
                               value="{{ old('party_code_acc') }}" autocomplete="party_code_acc">

                        @error('party_code_acc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_price_acc"><span class="required_lbl">*</span>{{ __('سعر الاكسسوار') }}
                        </label>
                        <input id="party_price_acc" type="text"
                               class="form-control @error('party_price_acc') is-invalid @enderror"
                               name="party_price_acc"
                               value="{{ old('party_price_acc') }}"
                               autocomplete="party_price_acc">

                        @error('party_price_acc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_color_acc"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                        <select class="js-example-basic-single" name="party_color_acc" id="party_color_acc">
                            <option value="" id=""></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        console.log('ddd')
    </script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $('#party_search').on('click', function () {
            let element = $(this);

            if (element.data('model') === "Party") {
                Url = '/get-party'
                model = element.data('model')
                placeholder = 'اختر الفستان بواسطة البحث عن طريق الكود'
            }
            $('#party_search').select2({
                placeholder: placeholder,
                minimumInputLength: 2,
                ajax: {
                    type: 'POST',
                    url: Url,
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term),
                            model: model
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    }, success: (data) => {
                        console.log(data[0].size)

                        // console.log(data.text)
                        $("#party_code").val(data[0].code);
                        // party_search
                        // $("#party_search").val(data[0].name);
                        // $("#party_model").val(data.text);
                        $('#party_search').append(`<option selected value="${data[0].name}">
                                     ${data[0].name}
                                  </option>`);
                        $('#party_model').append(`<option selected value="${data[0].model}">
                                     ${data[0].model}
                                  </option>`);

                        $("#party_price").val(data[0].price);
                        $("#party_color").val(data[0].color);
                        // $("#party_size").val(data[0].size);
                        $('#party_size').append(`<option selected value="${data[0].size}">
                                     ${data[0].size}
                                  </option>`);

                        var style =$('#party_color').attr('style'); //it will return string
//on submit update style as
                        style = `background-color:${data[0].color}`;
                        $('#party_color').attr('style',style);
                    },
                    // cache: true
                }
            });
        })
        $('#party_name_acc').on('click', function () {
            let element = $(this);

            if (element.data('model') === "Accessory") {
                Url = '/get-accessory'
                model = element.data('model')
                placeholder = 'اختر الاكسسوار بواسطة البحث عن طريق الكود'

                $('#party_name_acc').select2({
                    placeholder: placeholder,
                    minimumInputLength: 2,
                    ajax: {
                        type: 'POST',
                        url: Url,
                        dataType: 'json',
                        data: function (params) {
                            return {
                                q: $.trim(params.term),
                                model: model
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        }, success: (data) => {
                            console.log(data)

                            // console.log(data.text)
                            $("#party_code_acc").val(data[0].code);
                            // party_search
                            // $("#party_search").val(data[0].name);
                            // $("#party_model").val(data.text);
                            $('#party_name_acc').append(`<option selected value="${data[0].name}">
                                     ${data[0].name}
                                  </option>`);
                            $('#party_model_acc').append(`<option selected value="${data[0].model}">
                                     ${data[0].model}
                                  </option>`);

                            $("#party_price_acc").val(data[0].price);
                            $("#party_color_acc").val(data[0].color);
                            // $("#party_size").val(data[0].size);
                            $('#party_size_acc').append(`<option selected value="${data[0].size}">
                                     ${data[0].size}
                                  </option>`);


                            var style =$('#party_color_acc').attr('style'); //it will return string
//on submit update style as
                            style = `background-color:${data[0].color}`;
                            $('#party_color_acc').attr('style',style);
                        },
                        // cache: true
                    }
                });
            }
        })
    </script>
