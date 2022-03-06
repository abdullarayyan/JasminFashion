@extends('layouts.app')


@section('title', 'اضافة فساتين زفاف')
@section('page_title', 'اضافة فستان زفاف')

@section('css')
    <style>
        .datepicker > div {
            display: block;
        }

        .card-section {
            margin-bottom: 100px;
        }

        .fathers_title {
            width: 100%;
            font-size: 17px;
            padding-right: 15px;
            margin-bottom: 15px;
            color: #057a65;
        }

        .fathers_form.custom_form,
        .add_guardian_form.custom_form {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .logs {
            max-height: 360px;
            overflow: auto;
            padding-left: 10px;
        }

        .logs .log_item {
            padding-right: 35px;
            margin-bottom: 25px;
            position: relative;
        }

        .logs .indicator {
            position: absolute;
            right: 0;
            top: 5px;
            display: inline-block;
            width: 13px;
            height: 13px;
            border-radius: 20px;
            background-color: #057a65;
        }

        .logs .time {
            color: #575757;
            font-size: 14px;
        }

    </style>
@endsection

@section('content')
    {{--    {{dd($product->exists)}}--}}
    {!! Form::open($product->exists?
                                     ["route"=>["product.update",$product->id],"files"=>true,"class"=>"ajax-form",'method'=>'PUT']:
                                     ["route"=>["product.store"],"files"=>true,"class"=>"ajax-form",'method'=>'POST'] ) !!}
    @csrf

    <div class="tab-pane fade show active custom_form" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="form-group">
            <label for="name"><span class="required_lbl">*</span>{{ __('الإسم') }}</label>
            <input id="name" type="text" class="form-control required @error('name') is-invalid @enderror"
                   name="name" value="{{ $product->name??old('name')  }}" required
                   autocomplete="name">

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="code"><span class="required_lbl">*</span>{{ __('كود القطعه') }}</label>
            <input id="code" type="text" class="form-control required @error('code') is-invalid @enderror"
                   name="code" value="{{ $product->code??'#'.str_pad($product->id??'A' . 1, 8, "0", STR_PAD_LEFT) }}"
                   required
                   autocomplete="code">

            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="model"><span class="required_lbl">*</span>{{ __('موديل الفستان') }}</label>
            <input id="model" type="text" class="form-control required @error('model') is-invalid @enderror"
                   name="model" value="{{ $product->model??old('model')  }}" required
                   autocomplete="name">

            @error('model')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="size"><span class="required_lbl">*</span>{{ __('الحجم') }}</label>
            <select class="js-example-basic-single" name="size">
                <option value="{{$product->exists?$product->size:''}}">{{$product->exists?$product->size:''}}</option>
                <option value="small">Small</option>
                ...
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="x-large">X-Large</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status"><span class="required_lbl">*</span>{{ __('الحالة') }}</label>
            <select class="js-example-basic-single" name="status">
                <option value=""></option>

                <option {{$product->status==1?'selected':""}} value="1">محجوز</option>
                ...
                <option {{$product->status==0?'selected' : ''}} value="0">غير محجوز</option>
            </select>
        </div>

        <div class="form-group">
            <label for="color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
            <select class="js-example-basic-single" name="color">
                <option value="{{$product->exists?$product->color:""}}">{{$product->exists?$product->color:""}}</option>
                <option value="ابيض" style="background-color: white">ابيض</option>
                ...
                <option value="احمر" style="background-color: red">احمر</option>
                <option value="اخضر" style="background-color: green">اخضر</option>
                <option value="ازرق" style="background-color: blue">ازرق</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sale"><span class="required_lbl">*</span>{{ __('الخصم') }}</label>
            <select class="js-example-basic-single" name="sale">
                <option value="" selected></option>

                <option {{$product->status==1?'selected' : ''}} value="1">مسموح</option>
                <option {{$product->status==0?'selected' : ''}} value="0">غير مسموح</option>
            </select>
        </div>
        <div class="form-group">

            <label for="choose_file"><span
                    class="required_lbl">*</span>{{ __('اختيار المرفق') }}</label>

            <div class="form-control form-upload">
                <div class="d-flex align-items-center">
                    <button type="button"
                            onclick="document.getElementById('file_upload').click()">
                        اختار ملف
                    </button>
                    <label class="filename"></label>
                </div>
                <input required type='file' class="hidden_file_input" name="file"
                       id="file_upload">
            </div>
        </div>

{{--        <div class="form-group">--}}

{{--            <label for="choose_file"><span class="required_lbl">*</span>اختر صورة</label>--}}

{{--            <div class="form-control form-upload" style="border: solid 1px #fcefba !important; width: 100%;font-size: 16px;">--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                    <button type="button" onclick="document.getElementById('file_upload').click()" style="border: solid 1px #fcefba !important; color: black ;background-color: #fcefba ">--}}
{{--                        اختار صورة--}}
{{--                    </button>--}}
{{--                    <label for="img" class="filename"></label>--}}
{{--                </div>--}}
{{--                <input required type='file' class="hidden_file_input" name="file"--}}
{{--                       id="file_upload">--}}
{{--            </div>--}}
{{--        </div>--}}

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label for="description">الوصف</label>
            {{Form::textarea("description", $product->exists?$product->description:"", ['class'=>"form-control",'style'=>'height: 100px'])}}
        </div>


        <div class="col-md-12">
            <button class="btn btn--primary type--uppercase" type="submit" style="width: 10%">تخزين</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection
@section('js')

@endsection
