<style>
    /*.customers_form{*/
    /*    display: flex;*/
    /*    flex-wrap: wrap;*/
    /*    justify-content: space-evenly;*/
    /*    align-items: center;*/
    /*    flex-direction: row;*/
    /*}*/

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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer_name"><span class="required_lbl">*</span>{{ __('الإسم واسم العائلة') }}
                        </label>
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

                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="mobile"><span class="required_lbl">*</span>{{ __('رقم الجوال') }}</label>
                        <input id="mobile" type="number" maxlength="10"
                                 oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                 class="form-control required " name="mobile" value="" required="" autocomplete="mobile">


                        @error('mobile')
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
                        <label class="required_lbl">المدينة</label>
                        {{Form::select("city",\App\classes\IHouse::city(),null,["id"=>"cities",'placeholder'=>'اختر البلد','class'=>'form-control'])}}

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="required_lbl">البلده</label>
                        {{Form::select("town",[],null,['class'=>"form-control","id"=>"sub_cities"])}}

                    </div>
                </div>


            </div>

            <div class="form-group col-md-12">

                <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                           aria-controls="parents" aria-selected="true">تاريخ الحجز</a>
                    </li>

                </ul>
            </div>

            <div class="row">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
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
    </div>

</div>

<script>
    $("#cities").on("change",
        function () {
            let $list = $("#sub_cities");
            $list.prop("disabled", false);
            $list.empty();

            $.ajax({
                url: "{{ route("get-cities") }}",
                type: "GET",
                data: {id: $("#cities").val()},
                traditional: true,
                success: function (result) {
                    $list.empty();
                    $.each(result,
                        function (i, item) {
                            $list.append('<option value="' + item["id"] + '"> ' + item["name"] + ' </option>');
                        });
                },
                error: function () {
                    alert("Something went wrong");
                }
            });
        });

</script>
