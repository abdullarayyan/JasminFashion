@extends('layouts.app')


@section('title', 'إضافة حجز')


@section('page_title', 'إضافة حجز')



@section('css')
    <style>

        iframe {
            width: 100%;
            height: auto;
            position: relative;
            top: 10px;
        }

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
        {!! Form::open($reservation->exists?
                                            ["route"=>["reservation.update",$reservation->id],"files"=>true,"class"=>"ajax-form",'method'=>'PUT']:
                                            ["route"=>["reservation.store"],"files"=>true,"class"=>"ajax-form",'method'=>'POST'] ) !!}
        @csrf
        <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                   aria-controls="parents" aria-selected="true">معلومات الحجز</a>
            </li>

        </ul>
        {{--        <div class="col-md-6">--}}
        {{--            <div style="padding:177.100% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/694111705?h=5aced4dfc6&autoplay=1&loop=1&color=ff9933&title=0&byline=0&portrait=0&muted=1" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>--}}{{--                        <iframe src="https://player.vimeo.com/video/76979871?background=1autoplay=1&loop=1&autopause=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>--}}
        {{--        </div>--}}
        <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        @include('reservation.zbone-tab')
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @include('reservation.party-tab')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('reservation.dress-tab')
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 mt-4">
                        @if (isset($errors) && $errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <button class="btn btn--primary type--uppercase" type="submit" style="width: 36%">تخزين
                        </button>
                        {!! Form::close() !!}


                        <div class="header" style="display: flex;flex-direction: column;    width: 48%;">
                            <?php
                            $total_price = \App\Models\Reservation::query()
                                ->selectRaw('dress_price,dress_price_acc,party_price,party_price_acc,customer_name')->latest()->first();
                            ?>
                            @if($total_price)
                                <span class="alert alert-info " role="alert"
                                      style="font-weight: 900">دفع عربون لحجز باسم : {{$total_price->customer_name}}</span>
                                <span class="alert alert-info " style="font-weight: 900">
                        {{'السعر الاجمالي لهذا الحجز ='.($total_price->dress_price+$total_price->party_price+$total_price->dress_price_acc+$total_price->party_price_acc)}}
                             </span>
                            @endif
                        </div>

                        <div class="time">
                            <form action="{{route('update_total_price')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="total_price">{{ __('المبلغ المراد دفعه') }}</label>
                                    <input id="total_price" type="text"
                                           class="form-control @error('total_price') is-invalid @enderror"
                                           name="total_price"
                                           value="{{ old('total_price') }}"
                                           autocomplete="total_price" maxlength="10">

                                    @error('total_price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn--primary type--uppercase"
                                        style="width: 46%;    top: 30%;">
                                    تخزين العربون
                                </button>
                                <button class="btn btn--primary type--uppercase"
                                        style="background-color: #fd9292!important;;    width: inherit;"><a
                                        href="/reservation"> العوده لصفحة العرض</a></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div style="padding:177.100% 0 0 0;position:relative;">
                                        <iframe
                                            src="https://player.vimeo.com/video/694111705?h=5aced4dfc6&autoplay=1&loop=1&color=ff9933&title=0&byline=0&portrait=0&muted=1"
                                            style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
            </div>

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


