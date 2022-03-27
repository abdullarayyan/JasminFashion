<div class="accordion mt-4">
    <div class="dress_accordion accordion-header" data-toggle="collapse" data-target="#dress_section"
         aria-expanded="false" aria-controls="dress_section">
        <label class="accordion-title">ترحيل الى المخزون</label>
        <span class="bx bxs-chevron-down"></span>
    </div>
    <div class="collapse accordion-content" id="dress_section">
        <div class="">
            {!! Form::open(["route"=>["supplier.create-multi"],"files"=>true,"class"=>"ajax-form",'method'=>'POST']) !!}
            @csrf

{{--            <form action="{{route('supplier.create-multi')}}" method="GET" enctype="multipart/form-data">--}}
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="type"><span class="required_lbl">*</span>{{ __('اسم المخزون') }}</label>
                            <select class="js-example-basic-single" name="type" required>
                                <option
                                    value="{{$supplier->exists?$supplier->type:""}}">{{$supplier->exists?$supplier->type:""}}</option>
                                <option value="App\Models\Product" style="background-color: #eeeeee">فساتين زفاف</option>
                                ...
                                <option value="App\Models\Party" style="background-color: #eeeeee">فساتين سهرة</option>
                                <option value="App\Models\Accessory" style="background-color: #eeeeee">اكسسوار</option>
                                {{--                    <option value="2022" style="background-color: #eeeeee">متعدد</option>--}}
                            </select>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="quantity"><span class="required_lbl">*</span>{{ __('الكمية') }}</label>
                            <input id="quantity" type="text"
                                   class="form-control required @error('quantity') is-invalid @enderror" name="quantity"
                                   value="{{ old('quantity') }}" autocomplete="quantity" maxlength="10" required>

                            @error('quantity')
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
                            <label for="name"><span class="required_lbl">*</span>{{ __('اسم الفستان او الاكسسوار') }}</label>
                            <select class="js-example-basic-single" name="name">
                                <option value="{{$supplier->exists?$supplier->name:""}}">{{$supplier->exists?$supplier->name:""}}</option>
                                <option value="فستان زفاف" style="background-color: #eeeeee">فستان زفاف</option>
                                ...
                                <option value="فستان سمكه" style="background-color: #eeeeee">فستان سمكه</option>
                                <option value="فساتين زفاف البرنسيس" style="background-color: #eeeeee">فساتين زفاف البرنسيس</option>
                                <option value="فستان سواريه" style="background-color: #eeeeee">فستان سواريه</option>
                                <option value="عقد الالماس" style="background-color: #eeeeee">عقد الالماس</option>
                                ...
                                <option value="حلق الاذن المميز" style="background-color: #eeeeee">حلق الاذن المميز</option>
                                <option value="تاج راس بسيط" style="background-color: #eeeeee">تاج راس بسيط</option>
                                <option value="حلق اذن" style="background-color: #eeeeee">حلق اذن</option>
                                <option value="تاج" style="background-color: #eeeeee">تاج</option>
                                <option value="طقم اكسسوار" style="background-color: #eeeeee">طقم اكسسوار</option>
                                <option value="فستان سهرة قصير " style="background-color: #eeeeee">فستان سهرة قصير </option>                            <option value="App\Models\Party" style="background-color: #eeeeee">فساتين سهرة</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model"><span class="required_lbl">*</span>{{ __('موديل الفستان او الاكسسوار') }}</label>
                            <select class="js-example-basic-single" name="model">
                                <option value="{{$supplier->exists?$supplier->model:""}}">{{$supplier->exists?$supplier->model:""}}</option>
                                <option value="2019" style="background-color: #eeeeee">2019</option>
                                ...
                                <option value="2020" style="background-color: #eeeeee">2020</option>
                                <option value="2021" style="background-color: #eeeeee">2021</option>
                                <option value="2022" style="background-color: #eeeeee">2022</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price"><span class="required_lbl">*</span>{{ __('سعر القطعه') }}</label>
                            <input id="price" type="text" class="form-control required @error('model') is-invalid @enderror"
                                   name="price" value="{{ $supplier->price??'' }}" required
                                   autocomplete="name" maxlength="10">

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">اللون</label>

                            <input type='color' name='color' class='colorpicker'
                                   value="{{$supplier->color?$supplier->color:'#b49356'}}" style="padding-left: 15px"/>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="size"><span class="required_lbl">*</span>{{ __('الحجم') }}</label>
                            <select class="js-example-basic-multiple" name="size[]" multiple="multiple"
                                    style="border: 1px solid #fcefba!important;">
                                <option value="{{$supplier->size[0]??''}}" selected>{{$supplier->size[0]??''}}</option>
                                <option value="small">Small</option>
                                ...
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                                <option value="x-large">X-Large</option>
                                <option value="All-size">All Size</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">الوصف</label>
                            {{Form::textarea("description", $supplier->exists?$supplier->description:"", ['class'=>"form-control",'style'=>'height: 73px!important'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label for="choose_file"><span
                                    class="required_lbl">*</span>{{ __('اختيار صورة') }}</label>

                            <div class="form-control form-upload" style="border: 1px solid #fcefba;">
                                <div class="d-flex align-items-center">
                                    <button type="button" style="color: #0e0d0d;background-color: #d4b880"
                                            onclick="document.getElementById('file_upload').click()">
                                        اختار صورة
                                    </button>
                                    <label class="filename">{{$supplier->file}}</label>
                                </div>
                                <input  type='file' class="hidden_file_input" name="file"
                                        id="file_upload">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn--primary type--uppercase" type="submit" style="width: 36%">تخزين</button>
                </div>
            {!! Form::close() !!}


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


                        var style = $('#dress_color').attr('style'); //it will return string
//on submit update style as
                        style = `background-color:${data[0].color}`;
                        $('#dress_color').attr('style', style);
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

                            var style = $('#dress_color_acc').attr('style'); //it will return string
//on submit update style as
                            style = `background-color:${data[0].color}`;
                            $('#dress_color_acc').attr('style', style);

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
