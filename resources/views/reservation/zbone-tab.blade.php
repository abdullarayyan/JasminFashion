<div class="accordion mt-4">
    <div class="customer_accordion accordion-header" data-toggle="collapse" data-target="#customer_section"
         aria-expanded="false" aria-controls="customer_section">
        <label class="accordion-title">اضافة معلومات الزبون</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="customer_section">
        <div class="customers_form">
            <form id="add_customer_form" class="custom_form">
                {!! csrf_field() !!}
                <input type="hidden" id="yatem_id" name="yatem_id">

                <div class="form-group">
                    <label for="customer_full_name"><span class="required_lbl">*</span>{{ __('الإسم واسم العائلة') }}</label>
                    <input id="customer_full_name" type="text"
                           class="form-control required @error('customer_full_name') is-invalid @enderror"
                           name="customer_full_name"
                           value="{{ old('customer_full_name')  }}"
                           autocomplete="customer_full_name" maxlength="20">

                    @error('customer_full_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mobile"><span class="required_lbl">*</span>{{ __('رقم الجوال') }}</label>
                    <input id="mobile" type="text"
                           class="form-control required @error('mobile') is-invalid @enderror" name="mobile"
                           value="{{ old('mobile') }}" autocomplete="mobile" maxlength="10">

                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="customer_nationality"><span class="required_lbl">*</span>{{ __('المدينة') }}</label>
                    <input id="customer_nationality" type="text"
                           class="form-control @error('customer_nationality') is-invalid @enderror"
                           name="customer_nationality"
                           value="{{ old('customer_nationality') }}"
                           autocomplete="customer_nationality" maxlength="10">

                    @error('customer_nationality')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="customer_nationality"><span class="required_lbl">*</span>{{ __('البلدة') }}</label>
                    <input id="customer_nationality" type="text"
                           class="form-control @error('customer_nationality') is-invalid @enderror"
                           name="customer_nationality"
                           value="{{ old('customer_nationality') }}"
                           autocomplete="customer_nationality" maxlength="10">

                    @error('customer_nationality')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-12">

                <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab" aria-controls="parents" aria-selected="true">تاريخ الحجز</a>
                    </li>

                </ul>
                </div>
                <div class="form-group">
                    <label for="mother_birth_of_date"><span class="required_lbl">*</span>{{ __('ابتداء من') }}</label>
                    <input id="mother_birth_of_date" type="date" name="mother_birth_of_date"
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
                    <label for="mother_birth_of_date"><span class="required_lbl">*</span>{{ __('حتى نهاية') }}</label>
                    <input id="mother_birth_of_date" type="date" name="mother_birth_of_date"
                           class="date datepicker form-control @error('mother_birth_of_date') is-invalid @enderror"
                           value="{{ old('mother_birth_of_date') }}"
                           data-plugin="datepicker">

                    @error('mother_birth_of_date')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="btns mt-4">
                    <button type="button" id="add_customer" class="btn btn-primary">
                        {{ __('حفظ') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
