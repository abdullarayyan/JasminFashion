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
        <label class="accordion-title">اضافة معلومات المورد</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="customer_section" style="">
        <div class="customers_form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><span class="required_lbl">*</span>{{ __('اسم الجهة الموردة') }}
                        </label>
                        <input id="name" type="text"
                               class="form-control required @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name')  }}"
                               autocomplete="name" maxlength="20" required>

                        @error('name')
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
                        <label for="quantity"><span class="required_lbl">*</span>{{ __('الكمية') }}</label>
                        <input id="quantity" type="number" maxlength="5"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control required " name="quantity" value="" required="" autocomplete="quantity">



                        @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">

                    <div class="form-group">
                        <label for="email"><span class="required_lbl">*</span>{{ __('البريد الالكتروني') }}</label>
                        <input id="email" type="email"
                               class="form-control required @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" autocomplete="email" required>

                        @error('email')
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
                        <label for="country"><span class="required_lbl">*</span>{{ __('الدولة') }}</label>
                        {{Form::select("country",\App\classes\IHouse::country(),null,['id'=>'country','placeholder'=>'اختر الدولة','class'=>'form-control,required'])}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">

                        <label for="code"><span class="required_lbl">*</span>{{ __('كود المورد') }}</label>
                        <input id="code" type="text" class="form-control required @error('code') is-invalid @enderror"
                               name="code"
                               value="{{ "#".Haruncpi\LaravelIdGenerator\IdGenerator::generate(['table' => 'suppliers', 'length' => 5, 'prefix' =>\App\classes\IHouse::getSequenceSuppliers()]) }}"
                               autocomplete="code" maxlength="10" required>
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="str hide">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city"><span class="required_lbl">*</span>{{ __('الدولة') }}</label>
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

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type"><span class="required_lbl">*</span>{{ __('نوع البضاعة') }}</label>
                        <select class="js-example-basic-single" name="type" required>
                            <option
                                value="{{$supplier->exists?$supplier->type:""}}">{{$supplier->exists?$supplier->type:""}}</option>
                            <option value="App\Models\Product" style="background-color: #eeeeee">فساتين زفاف</option>
                            ...
                            <option value="App\Models\Party" style="background-color: #eeeeee">فساتين سهرة</option>
                            <option value="App\Models\Accessory" style="background-color: #eeeeee">اكسسوار</option>
                            <option value="2022" style="background-color: #eeeeee">متعدد</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="total_price"><span class="required_lbl">*</span>{{ __('سعر البضاعه') }}</label>

                        <input id="total_price" type="number" maxlength="5"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control required " name="total_price" value="" required="" autocomplete="total_price">
                        @error('total_price')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                </div>

            </div>


            <div class="col-md-12">
                <button class="btn btn--primary type--uppercase" type="submit" style="width: 36%">تخزين</button>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(() => {
        $('#country').change(function (e) {
            let value = $(this).val()
            console.log(value)

            if (value === 500) {
                $('.str').show()
            }
        });
    })</script>
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
