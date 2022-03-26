<div class="accordion mt-4">
    <div class="dress_accordion accordion-header" data-toggle="collapse" data-target="#dress_section"
         aria-expanded="false" aria-controls="dress_section">
        <label class="accordion-title">اضافة معلومات فستان الزفاف</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="dress_section">
        <div class="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dress_name">{{ __('اسم الفستان') }}</label>
                        <select name="dress_name" data-model="Product" class="form-control" id="dress_search">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dress_code"><span class="required_lbl">*</span>{{ __('كود الفستان') }}</label>
                        <input id="dress_code" type="text"
                               class="form-control required @error('dress_code') is-invalid @enderror" name="dress_code"
                               value="{{ old('dress_code') }}" autocomplete="dress_code" maxlength="10">

                        @error('dress_code')
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
                        <label for="dress_model"><span class="required_lbl">*</span>{{ __('موديل الفستان') }}</label>
                        <select class="js-example-basic-single" name="dress_model" id="dress_model">
                            <option value="" id=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dress_price"><span class="required_lbl">*</span>{{ __('سعر') }}</label>
                        <input id="dress_price" type="text"
                               class="form-control @error('dress_price') is-invalid @enderror"
                               name="dress_price"
                               value="{{ old('dress_price') }}"
                               autocomplete="dress_price" maxlength="10">

                        @error('dress_price')
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
                        <label for="dress_size"><span class="required_lbl">*</span>{{ __('الحجم') }}</label>
                        <select class="js-example-basic-single" name="dress_size" id="dress_size">
                            <option value="" id=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dress_color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                        <select class="js-example-basic-single" name="dress_color" id="dress_color">
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
                        <label for="dress_name_acc">{{ __('اسم الاكسسوار') }}</label>
                        <select name="dress_name_acc" data-model="Accessory" class="form-control" id="dress_name_acc">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="dress_code_acc"><span class="required_lbl">*</span>{{ __('كود الاكسسوار') }}</label>
                        <input id="dress_code_acc" type="text"
                               class="form-control required @error('dress_code_acc') is-invalid @enderror"
                               name="dress_code_acc"
                               value="{{ old('dress_code_acc') }}" autocomplete="dress_code_acc">

                        @error('dress_code_acc')
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
                        <label for="dress_price_acc"><span class="required_lbl">*</span>{{ __('سعر الاكسسوار') }}
                        </label>
                        <input id="dress_price_acc" type="text"
                               class="form-control @error('dress_price_acc') is-invalid @enderror"
                               name="dress_price_acc"
                               value="{{ old('dress_price_acc') }}"
                               autocomplete="dress_price_acc">

                        @error('dress_price_acc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dress_color_acc"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                        <select class="js-example-basic-single" name="dress_color_acc" id="dress_color_acc">
                            <option value="" id=""></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $('#dress_search').on('click', function () {
            let element = $(this);

            if (element.data('model') === "Product") {
                Url = '/get-product'
                model = element.data('model')
                placeholder = 'اختر الفستان بواسطة البحث عن طريق الكود'
            }
            $('#dress_search').select2({
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
                        $("#dress_code").val(data[0].code);
                        // dress_search
                        // $("#dress_search").val(data[0].name);
                        // $("#dress_model").val(data.text);
                        $('#dress_search').append(`<option selected value="${data[0].name}">
                                     ${data[0].name}
                                  </option>`);
                        $('#dress_model').append(`<option selected value="${data[0].model}">
                                     ${data[0].model}
                                  </option>`);

                        $("#dress_price").val(data[0].price);
                        $("#dress_color").val(data[0].color);
                        // $("#dress_size").val(data[0].size);
                        $('#dress_size').append(`<option selected value="${data[0].size}">
                                     ${data[0].size}
                                  </option>`);
                        // $('#dress_color').append(`<option selected value="${data[0].color}">
                        //              ${data[0].color}
                        //           </option>`);


                        var style =$('#dress_color').attr('style'); //it will return string
//on submit update style as
                        style = `background-color:${data[0].color}`;
                        $('#dress_color').attr('style',style);
                    },
                    // cache: true
                }
            });
        })
        $('#dress_name_acc').on('click', function () {
            let element = $(this);

            if (element.data('model') === "Accessory") {
                Url = '/get-accessory'
                model = element.data('model')
                placeholder = 'اختر الاكسسوار بواسطة البحث عن طريق الكود'

                $('#dress_name_acc').select2({
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
                            $("#dress_code_acc").val(data[0].code);
                            // dress_search
                            // $("#dress_search").val(data[0].name);
                            // $("#dress_model").val(data.text);
                            $('#dress_name_acc').append(`<option selected value="${data[0].name}">
                                     ${data[0].name}
                                  </option>`);
                            $('#dress_model_acc').append(`<option selected value="${data[0].model}">
                                     ${data[0].model}
                                  </option>`);

                            $("#dress_price_acc").val(data[0].price);
                            $("#dress_color_acc").val(data[0].color);
                            // $("#dress_size").val(data[0].size);
                            $('#dress_size_acc').append(`<option selected value="${data[0].size}">
                                     ${data[0].size}
                                  </option>`);

                            var style =$('#dress_color_acc').attr('style'); //it will return string
//on submit update style as
                            style = `background-color:${data[0].color}`;
                            $('#dress_color_acc').attr('style',style);

                        },
                        // cache: true
                    }
                });
            }
        })
    </script>


    <script>
        console.log('ddd')


    </script>
@endsection
