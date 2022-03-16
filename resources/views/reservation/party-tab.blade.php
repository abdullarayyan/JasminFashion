<div class="accordion mt-4">
    <div class="mother_accordion accordion-header" data-toggle="collapse" data-target="#mother_section"
         aria-expanded="false" aria-controls="mother_section">
        <label class="accordion-title">اضافة معلومات فستان السهرة</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="mother_section">
        <div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_name"><span class="required_lbl">*</span>{{ __('اسم الفستان') }}</label>
                        <input id="party_name" type="text"
                               class="form-control required @error('party_name') is-invalid @enderror"
                               name="party_name"
                               value="{{ old('party_name')  }}"
                               autocomplete="party_name" maxlength="20">

                        @error('party_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                        <select class="js-example-basic-single" name="party_model">
                            <option value=""></option>
                            <option value="2019" style="background-color: #eeeeee">2019</option>
                            ...
                            <option value="2020" style="background-color: #eeeeee">2020</option>
                            <option value="2021" style="background-color: #eeeeee">2021</option>
                            <option value="2022" style="background-color: #eeeeee">2022</option>
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
                        <select class="js-example-basic-multiple" name="party_size[]" multiple="multiple"
                                style="border: 1px solid #fcefba!important;">
                            <option value=""></option>
                            <option value="small">Small</option>
                            ...
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                            <option value="x-large">X-Large</option>
                            <option value="x-large">All Size</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="party_color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                        <select class="js-example-basic-single" name="party_color">
                            <option value=""></option>
                            <option value="ابيض" style="background-color: black">اسود</option>
                            ...
                            <option value="احمر" style="background-color: #eeeeee">سكري</option>
                            <option value="احمر" style="background-color: red">احمر</option>
                            <option value="احمر" style="background-color: green">اخضر</option>
                            <option value="احمر" style="background-color: cornflowerblue">ازرق</option>
                            <option value="احمر" style="background-color: white">ابيض</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">

                <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents"
                           role="tab"
                           aria-controls="parents" aria-selected="true">اضافة معلومات للاكسسوار</a>
                    </li>

                </ul>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="party_name_acc"><span class="required_lbl">*</span>{{ __('اسم الاكسسوار') }}</label>
                        <select class="js-example-basic-single" name="party_name_acc">
                            <option value=""></option>
                            <option value="عقد الالماس" style="background-color: #eeeeee">عقد الالماس</option>
                            ...
                            <option value="حلق الاذن المميز" style="background-color: #eeeeee">حلق الاذن المميز</option>
                            <option value="تاج راس بسيط" style="background-color: #eeeeee">تاج راس بسيط</option>
                            <option value="حلق اذن" style="background-color: #eeeeee">حلق اذن</option>
                            <option value="تاج" style="background-color: #eeeeee">تاج</option>
                            <option value="طقم اكسسوار" style="background-color: #eeeeee">طقم اكسسوار</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="party_code_acc"><span class="required_lbl">*</span>{{ __('كود الاكسسوار') }}</label>
                        <input id="party_code_acc" type="party_code_acc"
                               class="form-control required @error('party_code_acc') is-invalid @enderror" name="party_code_acc"
                               value="{{ old('party_code_acc') }}" autocomplete="party_code_acc" maxlength="10">

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
                               autocomplete="party_price_acc" maxlength="10">

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
                        <select class="js-example-basic-single" name="party_color_acc">
                            <option value=""></option>
                            <option value="ابيض" style="background-color: #ffb101">ذهبي</option>
                            ...
                            <option value="احمر" style="background-color: #eeeeee">فضي</option>
                        </select>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
