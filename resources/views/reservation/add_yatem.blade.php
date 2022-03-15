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

            <div class="father-not-found alert alert-danger hide" role="alert">
                يجب ادخال معلومات الأب أولاً
            </div>

            <div class="mother-not-found alert alert-danger hide" role="alert">
                يجب ادخال معلومات الأم أولاً
            </div>
        </div>

        <div class="required_fields mt-2 mb-4 d-none">
            <div role="alert" class="alert alert-danger">
                الرجاء ملئ جميع الخانات المطلوبة
            </div>
        </div>
        <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab" aria-controls="parents" aria-selected="true">معلومات الحجز</a>
            </li>

        </ul>

        @include('reservation.zbone-tab')
        @include('reservation.dress-tab')
        @include('reservation.party-tab')
{{--        @include('reservation.accessory-tab')--}}

    </div>

        <div class="card-section">
            <div class="header">
                <span class="card_title">سِجِل الحجز</span>
{{--                @if(@isset(->yatemHistory) and count(->yatemHistory) > 0)--}}
                    <div class="actions">
                        <button class="btn btn-outline-primary ml-0 small" onclick="window.print()">
                            <i class='bx bx-printer'></i>
                            {{ __('طباعة') }}
                        </button>
                    </div>
{{--                @endif--}}
            </div>
                <ul class="logs">
                        <li class="log_item">
                            <div class="details">
                                <span class="indicator"></span>
                                <span class="message"></span>
                            </div>
                            <div class="time"></div>
                        </li>
                </ul>

                <div class="alert alert-info mt-3" role="alert">
                    لا يوجد سجل لهذا الحجز
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

