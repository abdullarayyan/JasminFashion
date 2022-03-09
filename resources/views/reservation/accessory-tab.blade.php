<div class="accordion mt-4">
    <div class="accessory_accordion accordion-header" data-toggle="collapse" data-target="#accessory_section"
         aria-expanded="false" aria-controls="accessory_section">
        <label class="accordion-title">اضافة معلومات الاكسسوارات</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="accessory_section">
        <div class="accessories_form">
            <form id="mothers_form" class="custom_form">
                {!! csrf_field() !!}
                <input type="hidden" id="yatem_id" name="yatem_id">

                <div class="form-group">
                    <label for="mother_full_name"><span class="required_lbl">*</span>{{ __('الإسم الرباعي') }}</label>
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
                    <label for="mother_idc"><span class="required_lbl">*</span>{{ __('رقم الهوية') }}</label>
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
                    <label for="mother_nationality">{{ __('الجنسية') }}</label>
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
                    <label for="mother_birth_of_date">{{ __('تاريخ الميلاد') }}</label>
                    <input id="mother_birth_of_date" type="text" name="mother_birth_of_date"
                           class="date datepicker form-control @error('mother_birth_of_date') is-invalid @enderror"
                           value="{{ old('mother_birth_of_date') }}"
                           data-plugin="datepicker">

                    @error('mother_birth_of_date')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mother_total_children">{{ __('عدد الأولاد') }}</label>
                    <input id="mother_total_children" type="number"
                           class="form-control @error('mother_total_children') is-invalid @enderror"
                           name="mother_total_children"
                           value="{{ old('mother_total_children')  }}"
                           autocomplete="mother_total_children">

                    @error('mother_total_children')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mother_dead">{{ __('متوفية') }}</label>

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
