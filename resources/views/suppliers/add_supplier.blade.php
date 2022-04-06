@extends('layouts.app')


@section('title', 'إضافة حجز')


@section('page_title', 'إضافة حجز')



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
    <div class="card-section mb-4 hide-on-print">
        <div class="mt-2 mb-5">
            @if (session('message.yatem.added'))
                <div class="alert alert-success" role="alert">
                    {{ session('message.yatem.added') }}
                </div>
            @endif
        </div>

        <div class="required_fields mt-2 mb-4 d-none">
            <div role="alert" class="alert alert-danger">
                الرجاء ملئ جميع الخانات المطلوبة
            </div>
        </div>

        <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                   aria-controls="parents" aria-selected="true">معلومات الجهة الموردة</a>
            </li>

        </ul>
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            {!! Form::open($supplier->exists?
                                           ["route"=>["supplier.update",$supplier->id],"files"=>true,"class"=>"ajax-form",'method'=>'PUT']:
                                           ["route"=>["supplier.store"],"files"=>true,"class"=>"ajax-form",'method'=>'POST'] ) !!}
                            @csrf
                            @include('suppliers.suppliers-tab')

                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-12" style="    padding-left: 0px;padding-right: 15px">
                            @include('suppliers.supplier-tab')
                        </div>
                    </div>

                    <div class="col-md-6">
                        <img src="{{asset('assets/images/supplier.png')}}">
                    </div>
                </div>

            </div>
        </div>


        {{--        @include('suppliers.party-tab')--}}
        <div class="col-md-4" style="    margin-top: 32px;">

            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif


        </div>

    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection

