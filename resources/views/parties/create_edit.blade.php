@extends('layouts.app')


@section('title', 'اضافة فساتين سهرة')
@section('page_title', 'اضافة فستان سهرة')

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
    {{--    {{dd($product->exists)}}--}}
    {!! Form::open($party->exists?
                                     ["route"=>["party.update",$party->id],"files"=>true,"class"=>"ajax-form",'method'=>'PUT']:
                                     ["route"=>["party.store"],"files"=>true,"class"=>"ajax-form",'method'=>'POST'] ) !!}
    @csrf

    <div class="tab-pane fade show active custom_form" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="form-group">
            <label for="name"><span class="required_lbl">*</span>{{ __('الإسم') }}</label>
            <input id="name" type="text" class="form-control required @error('name') is-invalid @enderror"
                   name="name" value="{{ $party->name??old('name')  }}" required
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
                   name="code"
                   value="{{ "#".Haruncpi\LaravelIdGenerator\IdGenerator::generate(['table' => 'parties', 'length' => 5, 'prefix' =>\App\classes\IHouse::getSequenceParties()]) }}"

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
                   name="model" value="{{ $party->model??old('model')  }}" required
                   autocomplete="name">

            @error('model')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price"><span class="required_lbl">*</span>{{ __('سعر الفستان') }}</label>
            <input id="price" type="number" class="form-control required @error('model') is-invalid @enderror"
                   name="price" value="{{ $party->price??old('price')  }}" required
                   autocomplete="name">

            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity"><span class="required_lbl">*</span>{{ __('الكمية') }}</label>
            <input id="quantity" type="number" class="form-control required @error('model') is-invalid @enderror"
                   name="quantity" value="{{ $party->quantity??old('quantity')  }}" required
                   autocomplete="name">

            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="sale"><span class="required_lbl">*</span>{{ __('الخصم') }}</label>
            <select class="js-example-basic-single" name="sale">
                <option value="" selected></option>

                <option {{$party->status==1?'selected' : ''}} value="1">مسموح</option>
                <option {{$party->status==0?'selected' : ''}} value="0">غير مسموح</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status"><span class="required_lbl">*</span>{{ __('الحالة') }}</label>
            <select class="js-example-basic-single" name="status">
                <option value=""></option>

                <option {{$party->status==1?'selected':""}} value="1">محجوز</option>
                ...
                <option {{$party->status==0?'selected' : ''}} value="0">غير محجوز</option>
            </select>
        </div>

        <div class="form-group">
            <input class="custom_form colorpicker">
            <label for="color"><span class="required_lbl">*</span>{{ __('اللون') }}</label>
            <select class="js-example-basic-single" name="color">
                <option value="{{$party->exists?$party->color:""}}">{{$party->exists?$party->color:""}}</option>
                <option value="ابيض" style="background-color: white">ابيض</option>
                ...
                <option value="احمر" style="background-color: red">احمر</option>
                <option value="اخضر" style="background-color: green">اخضر</option>
                <option value="ازرق" style="background-color: blue">ازرق</option>
            </select>
        </div>

        <div class="form-group">

            <label for="choose_file"><span
                    class="required_lbl">*</span>{{ __('اختيار صورة') }}</label>

            <div class="form-control form-upload" style="border: 1px solid #fcefba;">
                <div class="d-flex align-items-center">
                    <button type="button" style="color: #0e0d0d;background-color: #d4b880"
                            onclick="document.getElementById('file_upload').click()">
                        اختار ملف
                    </button>
                    <label class="filename"></label>
                </div>
                <input required type='file' class="hidden_file_input" name="file"
                       id="file_upload">
            </div>
        </div>

        <div class="form-group">
            <label for="size"><span class="required_lbl">*</span>{{ __('الحجم') }}</label>
            <select class="js-example-basic-multiple" name="size[]" multiple="multiple"
                    style="border: 1px solid #fcefba!important;">
                <option value="{{$party->exists?$party->size:''}}">{{$party->exists?$party->size:''}}</option>
                <option value="small">Small</option>
                ...
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="x-large">X-Large</option>
                <option value="x-large">All Size</option>
            </select>

        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            {{Form::textarea("description", $party->exists?$party->description:"", ['class'=>"form-control",'style'=>'height: 73px!important'])}}
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