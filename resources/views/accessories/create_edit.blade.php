@extends('layouts.app')


@section('title', 'اضافةالاكسسوارات')
@section('page_title', 'اضافة اكسسوار')

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

        .select2 .select2-container .select2-container--default {
            border: 1px solid #fcefba !important;
        }
    </style>
@endsection

@section('content')
    {{--    {{dd($accessory->exists)}}--}}
    {!! Form::open($accessory->exists?
                                     ["route"=>["accessory.update",$accessory->id],"files"=>true,"class"=>"ajax-form",'method'=>'PUT']:
                                     ["route"=>["accessory.store"],"files"=>true,"class"=>"ajax-form",'method'=>'POST'] ) !!}
    @csrf

    <div class="tab-pane fade show active custom_form" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="form-group">
            <label for="name"><span class="required_lbl">*</span>{{ __('اسم الاكسسوار') }}</label>
            <select class="js-example-basic-single" name="name">
                <option value="{{$accessory->exists?$accessory->name:""}}">{{$accessory->exists?$accessory->name:""}}</option>
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
            <label for="code"><span class="required_lbl">*</span>{{ __('كود القطعه') }}</label>
            <input id="code" type="text" class="form-control required @error('code') is-invalid @enderror"
                   name="code"
                   value="{{ "#".Haruncpi\LaravelIdGenerator\IdGenerator::generate(['table' => 'accessories', 'length' => 5, 'prefix' =>\App\classes\IHouse::getSequenceAccessories()]) }}"

                   required
                   autocomplete="code"
                   maxlength="10">

            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="model"><span class="required_lbl">*</span>{{ __('موديل الاكسسوار') }}</label>
            <select class="js-example-basic-single" name="model">
                <option selected value="{{$accessory->exists?$accessory->model:""}}">{{$accessory->exists?$accessory->model:""}}</option>
                <option value="2019" style="background-color: #eeeeee">2019</option>
                ...
                <option value="2020" style="background-color: #eeeeee">2020</option>
                <option value="2021" style="background-color: #eeeeee">2021</option>
                <option value="2022" style="background-color: #eeeeee">2022</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price"><span class="required_lbl">*</span>{{ __('سعر الاكسسوار') }}</label>
            <input id="price" type="text" class="form-control required @error('model') is-invalid @enderror"
                   name="price" value="{{ $accessory->price  }}" required
                   autocomplete="name" maxlength="10">

            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="brand"><span class="required_lbl">*</span>{{ __('الماركة') }}</label>
            <input id="brand" type="text" class="form-control required @error('brand') is-invalid @enderror"
                   name="brand" value="{{ $accessory->brand??old('brand')  }}" required
                   autocomplete="name" maxlength="10">

            @error('brand')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="sale"><span class="required_lbl">*</span>{{ __('الخصم') }}</label>
            <select class="js-example-basic-single" name="sale">
                <option value="" selected></option>

                <option {{$accessory->status==0?'selected' : ''}} value="0">مسموح</option>
                <option {{$accessory->status==1?'selected' : ''}} value="1">غير مسموح</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status"><span class="required_lbl">*</span>{{ __('الحالة') }}</label>
            <select class="js-example-basic-single" name="status">
                <option value="{{$accessory->status?$accessory->status:""}}" selected>{{$accessory->exists?$accessory->status:""}}</option>

                <option {{$accessory->status==0?'selected':""}} value="0">محجوز</option>
                ...
                <option {{$accessory->status==1?'selected' : ''}} value="1">غير محجوز</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">اللون</label>

            <input type='color' name='color' class='colorpicker' value="{{$product->color?$product->color:'#b49356'}}" style="padding-left: 15px"/>

        </div>

        <div class="form-group">

            <label for="choose_file"><span
                    class="required_lbl">*</span>{{ __('اختيار صورة') }}</label>

            <div class="form-control form-upload" style="border: 1px solid #fcefba;">
                <div class="d-flex align-items-center">
                    <button type="button" style="color: #0e0d0d;background-color: #d4b880"
                            onclick="document.getElementById('file_upload').click()">
                        اختار صورة
                    </button>
                    <label class="filename">{{$accessory->exists?$accessory->file:''}}</label>
                </div>
                <input  type='file' class="hidden_file_input" name="file"
                       id="file_upload">
            </div>
        </div>



        <div class="form-group required">
            <label for="description">الوصف</label>
            {{Form::textarea("description", $accessory->exists?$accessory->description:"", ['class'=>"form-control",'style'=>'height: 73px!important'])}}
        </div>


        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <div class="col-md-12">
            <button class="btn btn--primary type--uppercase" type="submit" style="width: 10%">تخزين</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection
@section('js')
    <script>

        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
