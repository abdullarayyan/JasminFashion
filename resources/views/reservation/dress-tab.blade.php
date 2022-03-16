<div class="accordion mt-4">
    <div class="dress_accordion accordion-header" data-toggle="collapse" data-target="#dress_section"
         aria-expanded="false" aria-controls="dress_section">
        <label class="accordion-title">اضافة معلومات فستان الزفاف</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="dress_section">
        <div class="mothers_form">
                <input type="hidden" id="yatem_id" name="yatem_id">

                <div class="form-group">
                    <label for="dress_name"><span class="required_lbl">*</span>{{ __('اسم الفستان') }}</label>
                    <input id="dress_name" type="text"
                           class="form-control required @error('dress_name') is-invalid @enderror"
                           name="dress_name"
                           value="{{ old('dress_name')  }}"
                           autocomplete="dress_name" maxlength="20">

                    @error('dress_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                <div class="form-group">
                    <label for="dress_model"><span class="required_lbl">*</span>{{ __('موديل الفستان') }}</label>
                    <select class="js-example-basic-single" name="dress_model">
                        <option value=""></option>
                        <option value="2019" style="background-color: #eeeeee">2019</option>
                        ...
                        <option value="2020" style="background-color: #eeeeee">2020</option>
                        <option value="2021" style="background-color: #eeeeee">2021</option>
                        <option value="2022" style="background-color: #eeeeee">2022</option>
                    </select>
                </div>
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

                <div class="form-group">
                    <label for="dress_size"><span class="required_lbl">*</span>{{ __('الحجم') }}</label>
                    <select class="js-example-basic-multiple" name="dress_size[]" multiple="multiple"
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

                <div class="form-group">
                    <label for="dress_color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                    <select class="js-example-basic-single" name="dress_color">
                        <option value=""></option>
                        <option value="ابيض" style="background-color: white">ابيض</option>
                        ...
                        <option value="احمر" style="background-color: #f6f3e8">سكري</option>

                    </select>
                </div>

                <div class="form-group col-md-12">

                    <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab" aria-controls="parents" aria-selected="true">اضافة معلومات للاكسسوار</a>
                        </li>

                    </ul>
                </div>

                <div class="form-group">
                    <label for="dress_name_acc"><span class="required_lbl">*</span>{{ __('اسم الاكسسوار') }}</label>
                    <select class="js-example-basic-single" name="dress_name_acc">
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

                <div class="form-group">
                    <label for="dress_code_acc"><span class="required_lbl">*</span>{{ __('كود الاكسسوار') }}</label>
                    <input id="dress_name_acc" type="number"
                           class="form-control required @error('dress_name_acc') is-invalid @enderror" name="dress_name_acc"
                           value="{{ old('dress_name_acc') }}" autocomplete="dress_name_acc">

                    @error('dress_name_acc')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dress_price_acc"><span class="required_lbl">*</span>{{ __('سعر الاكسسوار') }}</label>
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

                <div class="form-group">
                    <label for="dress_color_acc"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                    <select class="js-example-basic-single" name="dress_color_acc">
                        <option value=""></option>
                        <option value="ابيض" style="background-color: #ffb101">ذهبي</option>
                        ...
                        <option value="احمر" style="background-color: #eeeeee">فضي</option>
                    </select>
                </div>



        </div>
    </div>
</div>
