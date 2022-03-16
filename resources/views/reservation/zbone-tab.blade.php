<style>
    .customers_form{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-items: center;
        flex-direction: row;
    }

</style>
<div class="accordion mt-4" style="">
    <div class="customer_accordion accordion-header" data-toggle="collapse" data-target="#customer_section"
         aria-expanded="false" aria-controls="customer_section">
        <label class="accordion-title">اضافة معلومات الزبون</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="customer_section" style="">
        <div class="customers_form">
                <input type="hidden" id="yatem_id" name="yatem_id">

                <div class="form-group">
                    <label for="customer_name"><span class="required_lbl">*</span>{{ __('الإسم واسم العائلة') }}</label>
                    <input id="customer_name" type="text"
                           class="form-control required @error('customer_name') is-invalid @enderror"
                           name="customer_name"
                           value="{{ old('customer_name')  }}"
                           autocomplete="customer_name" maxlength="20">

                    @error('customer_name')
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
                    <label for="city"><span class="required_lbl">*</span>{{ __('المدينة') }}</label>
                    <input id="city" type="text"
                           class="form-control @error('city') is-invalid @enderror"
                           name="city"
                           value="{{ old('city') }}"
                           autocomplete="city" maxlength="10">

                    @error('city')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="town"><span class="required_lbl">*</span>{{ __('البلدة') }}</label>
                    <input id="town" type="text"
                           class="form-control @error('town') is-invalid @enderror"
                           name="town"
                           value="{{ old('town') }}"
                           autocomplete="town" maxlength="10">

                    @error('town')
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
                    <label for="from"><span class="required_lbl">*</span>{{ __('ابتداء من') }}</label>
                    <input id="from" type="date" name="from"
                           class="date datepicker form-control @error('from') is-invalid @enderror"
                           value="{{ old('from') }}"
                           data-plugin="datepicker">

                    @error('from')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="to"><span class="required_lbl">*</span>{{ __('حتى نهاية') }}</label>
                    <input id="to" type="date" name="to"
                           class="date datepicker form-control @error('to') is-invalid @enderror"
                           value="{{ old('to') }}"
                           data-plugin="datepicker">

                    @error('to')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

        </div>
    </div>
</div>
