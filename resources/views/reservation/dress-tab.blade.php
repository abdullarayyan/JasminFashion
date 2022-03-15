<div class="accordion mt-4">
    <div class="dress_accordion accordion-header" data-toggle="collapse" data-target="#dress_section"
         aria-expanded="false" aria-controls="dress_section">
        <label class="accordion-title">اضافة معلومات فستان الزفاف</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="dress_section">
        <div class="mothers_form">
            <form id="add_dress_form" class="custom_form">
                {!! csrf_field() !!}
                <input type="hidden" id="yatem_id" name="yatem_id">

                <div class="form-group">
                    <label for="mother_full_name"><span class="required_lbl">*</span>{{ __('اسم الفستان') }}</label>
                    <input id="mother_full_name" type="text"
                           class="form-control required @error('mother_full_name') is-invalid @enderror"
                           name="mother_full_name"
                           value="{{ old('mother_full_name')  }}"
                           autocomplete="mother_full_name" maxlength="20">

                    @error('mother_full_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_idc"><span class="required_lbl">*</span>{{ __('كود الفستان') }}</label>
                    <input id="mother_idc" type="text"
                           class="form-control required @error('mother_idc') is-invalid @enderror" name="mother_idc"
                           value="{{ old('mother_idc') }}" autocomplete="mother_idc" maxlength="10">

                    @error('mother_idc')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="model"><span class="required_lbl">*</span>{{ __('موديل الفستان') }}</label>
                    <select class="js-example-basic-single" name="model">
                        <option value=""></option>
                        <option value="2019" style="background-color: #eeeeee">2019</option>
                        ...
                        <option value="2020" style="background-color: #eeeeee">2020</option>
                        <option value="2021" style="background-color: #eeeeee">2021</option>
                        <option value="2022" style="background-color: #eeeeee">2022</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mother_nationality"><span class="required_lbl">*</span>{{ __('سعر') }}</label>
                    <input id="mother_nationality" type="text"
                           class="form-control @error('mother_nationality') is-invalid @enderror"
                           name="mother_nationality"
                           value="{{ old('mother_nationality') }}"
                           autocomplete="mother_nationality" maxlength="10">

                    @error('mother_nationality')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="size"><span class="required_lbl">*</span>{{ __('الحجم') }}</label>
                    <select class="js-example-basic-multiple" name="size[]" multiple="multiple"
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
                    <label for="color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                    <select class="js-example-basic-single" name="color">
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
                    <label for="name"><span class="required_lbl">*</span>{{ __('اسم الاكسسوار') }}</label>
                    <select class="js-example-basic-single" name="name">
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
                    <label for="mother_idc"><span class="required_lbl">*</span>{{ __('كود الاكسسوار') }}</label>
                    <input id="mother_idc" type="number"
                           class="form-control required @error('mother_idc') is-invalid @enderror" name="mother_idc"
                           value="{{ old('mother_idc') }}" autocomplete="mother_idc">

                    @error('mother_idc')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_nationality"><span class="required_lbl">*</span>{{ __('سعر الاكسسوار') }}</label>
                    <input id="mother_nationality" type="text"
                           class="form-control @error('mother_nationality') is-invalid @enderror"
                           name="mother_nationality"
                           value="{{ old('mother_nationality') }}"
                           autocomplete="mother_nationality">

                    @error('mother_nationality')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
                    <select class="js-example-basic-single" name="color">
                        <option value=""></option>
                        <option value="ابيض" style="background-color: #ffb101">ذهبي</option>
                        ...
                        <option value="احمر" style="background-color: #eeeeee">فضي</option>
                    </select>
                </div>


                <div class="btns mt-4">
                    <button type="button" id="add_mother" class="btn btn-primary">
                        {{ __('حفظ') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
