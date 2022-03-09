<div class="accordion mt-4">
    <div class="mother_accordion accordion-header" data-toggle="collapse" data-target="#mother_section"
         aria-expanded="false" aria-controls="mother_section">
        <label class="accordion-title">اضافة معلومات فستان السهرة</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="mother_section">
        <div class="mothers_form">
            <form id="add_mother_form" class="custom_form">
                {!! csrf_field() !!}
                <input type="hidden" id="yatem_id" name="yatem_id">

                <div class="form-group">
                    <label for="mother_full_name"><span class="required_lbl">*</span>{{ __('اسم الفستان') }}</label>
                    <input id="mother_full_name" type="text"
                           class="form-control required @error('mother_full_name') is-invalid @enderror"
                           name="mother_full_name"
                           value="{{ old('mother_full_name')  }}"
                           autocomplete="mother_full_name">

                    @error('mother_full_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_idc"><span class="required_lbl">*</span>{{ __('كود الفستان') }}</label>
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
                    <label for="mother_nationality">{{ __('موديل') }}</label>
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
                    <label for="mother_nationality">{{ __('سعر') }}</label>
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
                    <label for="mother_dead">{{ __('حجم الفستان') }}</label>

                    <select id="mother_dead" name="mother_dead"
                            class="select2 form-control @error('mother_dead') is-invalid @enderror">
                        <option value="1">نعم</option>
                        <option selected value="0">لا</option>
                    </select>
                    {{--                        <select id="mother_dead" name="mother_dead"--}}
                    {{--                                class="select2 form-control @error('mother_dead') is-invalid @enderror">--}}
                    {{--                            <option {{ $yatem->mother->dead == 1 ? 'selected' : '' }} value="1">نعم--}}
                    {{--                            </option>--}}
                    {{--                            <option {{ $yatem->mother->dead == 0 ? 'selected' : '' }} value="0">لا--}}
                    {{--                            </option>--}}
                    {{--                        </select>--}}

                    @error('mother_dead')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mother_dead">{{ __('لون الفستان') }}</label>

                    <select id="mother_dead" name="mother_dead"
                            class="select2 form-control @error('mother_dead') is-invalid @enderror">
                        <option value="1">نعم</option>
                        <option selected value="0">لا</option>
                    </select>
                    {{--                        <select id="mother_dead" name="mother_dead"--}}
                    {{--                                class="select2 form-control @error('mother_dead') is-invalid @enderror">--}}
                    {{--                            <option {{ $yatem->mother->dead == 1 ? 'selected' : '' }} value="1">نعم--}}
                    {{--                            </option>--}}
                    {{--                            <option {{ $yatem->mother->dead == 0 ? 'selected' : '' }} value="0">لا--}}
                    {{--                            </option>--}}
                    {{--                        </select>--}}

                    @error('mother_dead')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-12">

                    <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab" aria-controls="parents" aria-selected="true">اضافة معلومات للاكسسوار</a>
                        </li>

                    </ul>
                </div>

                <div class="form-group">
                    <label for="mother_full_name"><span class="required_lbl">*</span>{{ __('اسم الاكسسوار') }}</label>
                    <input id="mother_full_name" type="text"
                           class="form-control required @error('mother_full_name') is-invalid @enderror"
                           name="mother_full_name"
                           value="{{ old('mother_full_name')  }}"
                           autocomplete="mother_full_name">

                    @error('mother_full_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
                    <label for="mother_nationality">{{ __('سعر الاكسسوار') }}</label>
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
                    <label for="mother_dead">{{ __('لون الاكسسوار') }}</label>

                    <select id="mother_dead" name="mother_dead"
                            class="select2 form-control @error('mother_dead') is-invalid @enderror">
                        <option value="1">نعم</option>
                        <option selected value="0">لا</option>
                    </select>
                    {{--                        <select id="mother_dead" name="mother_dead"--}}
                    {{--                                class="select2 form-control @error('mother_dead') is-invalid @enderror">--}}
                    {{--                            <option {{ $yatem->mother->dead == 1 ? 'selected' : '' }} value="1">نعم--}}
                    {{--                            </option>--}}
                    {{--                            <option {{ $yatem->mother->dead == 0 ? 'selected' : '' }} value="0">لا--}}
                    {{--                            </option>--}}
                    {{--                        </select>--}}

                    @error('mother_dead')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
