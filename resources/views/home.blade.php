@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('page_title', 'الصفحة الرئيسية')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
    /************************
Css orignal https://codepen.io/jlalovi/details/bIyAr
************************/
    @import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700);

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        background: #1f253d;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding-left: 0;
    }

    h1 {
        font-size: 23px;
    }

    h2 {
        font-size: 17px;
    }

    p {
        font-size: 15px;
    }

    a {
        text-decoration: none;
        font-size: 15px;
    }

    a:hover {
        text-decoration: underline;
    }

    h1, h2, p, a, span {
        color: #fff;
    }

    .scnd-font-color {
        color: #9099b7;
    }

    .titular {
        display: block;
        line-height: 60px;
        margin: 0;
        text-align: center;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .horizontal-list {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .horizontal-list li {
        float: left;
    }

    .block {
        margin: 25px 25px 0 0;
        background: #394264;
        border-radius: 5px;
        float: left;
        width: 300px;
        overflow: hidden;
    }

    /******************************************** LEFT CONTAINER *****************************************/
    .left-container {
    }

    .menu-box {
        height: 360px;
    }

    .donut-chart-block {
        overflow: hidden;
    }

    .donut-chart-block .titular {
        padding: 10px 0;
    }

    .os-percentages li {
        width: 75px;
        border-left: 1px solid #394264;
        text-align: center;
        background: #50597b;
    }

    .os {
        margin: 0;
        padding: 10px 0 5px;
        font-size: 15px;
    }

    .os.ios {
        border-top: 4px solid #e64c65;
    }

    .os.mac {
        border-top: 4px solid #11a8ab;
    }

    .os.linux {
        border-top: 4px solid #fcb150;
    }

    .os.win {
        border-top: 4px solid #4fc4f6;
    }

    .os-percentage {
        margin: 0;
        padding: 0 0 15px 10px;
        font-size: 25px;
    }

    .line-chart-block, .bar-chart-block {
        height: 400px;
    }

    .line-chart {
        height: 200px;
        background: #11a8ab;
    }

    .time-lenght {
        padding-top: 22px;
        padding-left: 38px;
        overflow: hidden;
    }

    .time-lenght-btn {
        display: block;
        width: 70px;
        line-height: 32px;
        background: #50597b;
        border-radius: 5px;
        font-size: 14px;
        text-align: center;
        margin-right: 5px;
        -webkit-transition: background .3s;
        transition: background .3s;
    }

    .time-lenght-btn:hover {
        text-decoration: none;
        background: #e64c65;
    }

    .month-data {
        padding-top: 28px;
    }

    .month-data p {
        display: inline-block;
        margin: 0;
        padding: 0 25px 15px;
        font-size: 16px;
    }

    .month-data p:last-child {
        padding: 0 25px;
        float: right;
        font-size: 15px;
    }

    .increment {
        color: #e64c65;
    }

    /******************************************
    ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
    ESTILOS PROPIOS DE LOS GRÄFICOS
    ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑
    GRAFICO LINEAL
    ******************************************/

    .grafico {
        padding: 2rem 1rem 1rem;
        width: 100%;
        height: 100%;
        position: relative;
        color: #fff;
        font-size: 80%;
    }

    .grafico span {
        display: block;
        position: absolute;
        bottom: 3rem;
        left: 2rem;
        height: 0;
        border-top: 2px solid;
        transform-origin: left center;
    }

    .grafico span > span {
        left: 100%;
        bottom: 0;
    }

    [data-valor='25'] {
        width: 75px;
        transform: rotate(-45deg);
    }

    [data-valor='8'] {
        width: 24px;
        transform: rotate(65deg);
    }

    [data-valor='13'] {
        width: 39px;
        transform: rotate(-45deg);
    }

    [data-valor='5'] {
        width: 15px;
        transform: rotate(50deg);
    }

    [data-valor='23'] {
        width: 69px;
        transform: rotate(-70deg);
    }

    [data-valor='12'] {
        width: 36px;
        transform: rotate(75deg);
    }

    [data-valor='15'] {
        width: 45px;
        transform: rotate(-45deg);
    }

    [data-valor]:before {
        content: '';
        position: absolute;
        display: block;
        right: -4px;
        bottom: -3px;
        padding: 4px;
        background: #fff;
        border-radius: 50%;
    }

    [data-valor='23']:after {
        content: '+' attr(data-valor) '%';
        position: absolute;
        right: -2.7rem;
        top: -1.7rem;
        padding: .3rem .5rem;
        background: #50597B;
        border-radius: .5rem;
        transform: rotate(45deg);
    }

    [class^='eje-'] {
        position: absolute;
        left: 0;
        bottom: 0rem;
        width: 100%;
        padding: 1rem 1rem 0 2rem;
        height: 80%;
    }

    .eje-x {
        height: 2.5rem;
    }

    .eje-y li {
        height: 25%;
        border-top: 1px solid #777;
    }

    [data-ejeY]:before {
        content: attr(data-ejeY);
        display: inline-block;
        width: 2rem;
        text-align: right;
        line-height: 0;
        position: relative;
        left: -2.5rem;
        top: -.5rem;
    }

    .eje-x li {
        width: 33%;
        float: left;
        text-align: center;
    }

    /******************************************
    GRAFICO CIRCULAR PIE CHART
    ******************************************/
    .donut-chart {
        position: relative;
        width: 200px;
        height: 200px;
        margin: 0 auto 2rem;
        border-radius: 100%
    }

    p.center-date {
        background: #394264;
        position: absolute;
        text-align: center;
        font-size: 28px;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 130px;
        height: 130px;
        margin: auto;
        border-radius: 50%;
        line-height: 35px;
        padding: 15% 0 0;
    }

    .center-date span.scnd-font-color {
        line-height: 0;
    }

    .recorte {
        border-radius: 50%;
        clip: rect(0px, 200px, 200px, 100px);
        height: 100%;
        position: absolute;
        width: 100%;
    }

    .quesito {
        border-radius: 50%;
        clip: rect(0px, 100px, 200px, 0px);
        height: 100%;
        position: absolute;
        width: 100%;
        font-family: monospace;
        font-size: 1.5rem;
    }

    #porcion1 {
        transform: rotate(0deg);
    }

    #porcion1 .quesito {
        background-color: #E64C65;
        transform: rotate(76deg);
    }

    #porcion2 {
        transform: rotate(76deg);
    }

    #porcion2 .quesito {
        background-color: #11A8AB;
        transform: rotate(140deg);
    }

    #porcion3 {
        transform: rotate(215deg);
    }

    #porcion3 .quesito {
        background-color: #4FC4F6;
        transform: rotate(113deg);
    }

    #porcionFin {
        transform: rotate(-32deg);
    }

    #porcionFin .quesito {
        background-color: #FCB150;
        transform: rotate(32deg);
    }

    .nota-final {
        clear: both;
        color: #4FC4F6;
        font-size: 1rem;
        padding: 2rem 0;
    }

    .nota-final strong {
        color: #E64C65;
    }

    .nota-final a {
        color: #FCB150;
        font-size: inherit;
    }

    /**************************
    BAR-CHART
    **************************/
    .grafico.bar-chart {
        background: #3468AF;
        padding: 0 1rem 2rem 1rem;
        width: 100%;
        height: 60%;
        position: relative;
        color: #fff;
        font-size: 80%;
    }

    .bar-chart [class^='eje-'] {
        padding: 0 1rem 0 2rem;
        bottom: 1rem;
    }

    .bar-chart .eje-x {
        bottom: 0;
    }

    .bar-chart .eje-y li {
        height: 20%;
        border-top: 1px solid #fff;
    }

    .bar-chart .eje-x li {
        width: 14%;
        position: relative;
        text-align: left;
    }

    .bar-chart .eje-x li i {
        transform: rotatez(-45deg) translatex(-1rem);
        transform-origin: 30% 60%;
        display: block;
    }

    .bar-chart .eje-x li:before {
        content: '';
        position: absolute;
        bottom: 1.9rem;
        width: 70%;
        right: 5%;
        box-shadow: 3px 0 rgba(0, 0, 0, .1), 3px -3px rgba(0, 0, 0, .1);
    }

    .bar-chart .eje-x li:nth-child(1):before {
        background: #E64C65;
        height: 570%;
    }

    .bar-chart .eje-x li:nth-child(2):before {
        background: #11A8AB;
        height: 900%;
    }

    .bar-chart .eje-x li:nth-child(3):before {
        background: #FCB150;
        height: 400%;
    }

    .bar-chart .eje-x li:nth-child(4):before {
        background: #4FC4F6;
        height: 290%;
    }

    .bar-chart .eje-x li:nth-child(5):before {
        background: #FFED0D;
        height: 720%;
    }

    .bar-chart .eje-x li:nth-child(6):before {
        background: #F46FDA;
        height: 820%;
    }

    .bar-chart .eje-x li:nth-child(7):before {
        background: #15BFCC;
        height: 520%;
    }

    /*****************************
    USO NÚMEROS MÁGICOS EN ALGUNOS VALORES
    POR NO PARARME A ESTUDIAR A FONDO
    EL CSS DEL PEN ORIGINAL
    *****************************/
    .card-box {
        position: relative;
        color: #fff;
        padding: 20px 10px 40px;
        margin: 20px 0px;
    }

    .card-box:hover {
        text-decoration: none;
        color: #f1f1f1;
    }

    .card-box:hover .icon i {
        font-size: 100px;
        transition: 1s;
        -webkit-transition: 1s;
    }

    .card-box .inner {
        padding: 5px 10px 0 10px;
    }

    .card-box h3 {
        font-size: 27px;
        font-weight: bold;
        margin: 0 0 8px 0;
        white-space: nowrap;
        padding: 0;
        text-align: left;
    }

    .card-box p {
        font-size: 15px;
    }

    .card-box .icon {
        position: absolute;
        top: auto;
        bottom: 5px;
        right: 5px;
        z-index: 0;
        font-size: 72px;
        color: rgba(0, 0, 0, 0.15);
    }

    .card-box .card-box-footer {
        position: absolute;
        left: 0px;
        bottom: 0px;
        text-align: center;
        padding: 3px 0;
        color: rgba(255, 255, 255, 0.8);
        background: rgba(0, 0, 0, 0.1);
        width: 100%;
        text-decoration: none;
    }

    .card-box:hover .card-box-footer {
        background: rgba(0, 0, 0, 0.3);
    }

    .bg-blue {
        background-color: #00c0ef !important;
    }

    .bg-green {
        background-color: #00a65a !important;
    }

    .bg-orange {
        background-color: #f39c12 !important;
    }

    .bg-red {
        background-color: #d9534f !important;
    }

    .card-body > h5 {
        margin: 0;
    }
</style>


<style>

</style>
@section('content')
    <div class="hide">

        {{

            $count_dress = \App\Models\Product::query()->count(),
            $count_dress_available = \App\Models\Product::query()->where('status',1)->count(),
            $count_dress_un_available = \App\Models\Product::query()->where('status',0)->count(),
            $count_party = \App\Models\Party::query()->count(),
            $count_party_available = \App\Models\Party::query()->where('status',1)->count(),
            $count_party_un_available = \App\Models\Party::query()->where('status',0)->count(),
            $accessory = \App\Models\Accessory::query()->count(),
            $count_accessory_available = \App\Models\Party::query()->where('status',1)->count(),
            $count_accessory_un_available = \App\Models\Party::query()->where('status',0)->count(),
            $product = \App\Models\Product::query()->get(),
            $party=\App\Models\Party::query()->get(),
            $accessory_ = \App\Models\Accessory::query()->get(),

            $total_price_dress = \App\Models\Reservation::query()->sum('dress_price'),
            $total_price_party = \App\Models\Reservation::query()->sum('party_price'),
            $total_dress_acc = \App\Models\Reservation::query()->sum('dress_price_acc'),
            $total_party_acc = \App\Models\Reservation::query()->sum('party_price_acc'),
            $total_acc = ($total_dress_acc??0)+($total_party_acc??0),

        }}
    </div>


    <div class="card-section">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box bg-blue">
                        <div class="inner">
                            <h3> {{$count_dress}} </h3>
                            <p> مخزون فساتين الزفاف </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box bg-blue">
                        <div class="inner">
                            <h3> {{$count_party}} </h3>
                            <p>مخزون فساتين السهرة </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box bg-blue">
                        <div class="inner">
                            <h3> {{$accessory}} </h3>
                            <p> مخزون الاكسسوارات </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box bg-green">
                        <div class="inner">
                            <h3> {{$count_dress_available}} </h3>
                            <p> فساتين زفاف المتوفرة </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box bg-green">
                        <div class="inner">
                            <h3> {{$count_party_available}} </h3>
                            <p> فساتين سهرة المتوفرة </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box bg-green">
                        <div class="inner">
                            <h3> {{$count_accessory_available}} </h3>
                            <p> الاكسسوارات المتوفرة </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box bg-orange">
                        <div class="inner">
                            <h3> {{$count_dress_un_available}} </h3>
                            <p> فساتين زفاف المحجوزه </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box bg-orange">
                        <div class="inner">
                            <h3> {{$count_party_un_available}} </h3>
                            <p> فساتين سهرة المحجوزة </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box bg-orange">
                        <div class="inner">
                            <h3> {{$count_accessory_un_available}} </h3>
                            <p> الاكسسوارات المحجوزة </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>


            <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                       aria-controls="parents" aria-selected="true">الدخل السنوي لسنة {{now()->year}}</a>
                </li>

            </ul>
            <div class="row">
                <div class="col-md-4">
                    <div class="">
                        <div class="card-box bg-green">
                            <div class="inner">
                                <h3> {{$total_price_dress??0}}₪ </h3>
                                <p> اجمالي دخل فساتين الزفاف </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <div class="card-box bg-green">
                            <div class="inner">
                                <h3> {{$total_price_party??0}}₪ </h3>
                                <p> اجمالي دخل فساتين السهرة </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <div class="card-box bg-green">
                            <div class="inner">
                                <h3> {{$total_acc??0}}₪ </h3>
                                <p> اجمالي دخل الاكسسوارات </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                       aria-controls="parents" aria-selected="true">تريند</a>
                </li>

            </ul>
            <h3 class="text-center">فستان الزفاف الاكثر طلبا</h3>
            <hr>

            <div class="row">
                @foreach($product as $value)
                    <div class="col-md-4">
                        <div class="card" style="">
                            @if($value->file=='')
                                <img alt="Image" src="{{ asset('assets/images/logo.png') }}" class="card-img-top">
                            @else
                                <img alt="Image" src="{{ asset('images/').'/'.$value->file}}"
                                     class="card-img-top">
                            @endif
                            {{--                            <img class="card-img-top" src="#" alt="Card image cap">--}}
                            <div class="card-body m-0">
                                <h5 class="card-title" style="margin: 0;">اسم الفستان : {{$value->name}}</h5>
                                <h5 class="card-title" style="margin: 0;">سعر الفستان : {{$value->price}}</h5>
                                <h5 class="card-title" style="margin: 0;">موديل الفستان : {{$value->model}}</h5>
                                <h5 class="card-title" style="margin: 0;">كود الفستان : {{$value->code}}</h5>
                                <h5 class="card-title" style="margin: 0;">حجم الفستان : {{$value->size[0]}}</h5>
                                لون الفستان :
                                <h5 class="card-title"
                                    style="margin: 0; background-color: {{$value->color}};color: {{$value->color}}"> {{$value->color}}</h5>
                                <h5 class="card-title" style="margin: 0;">حجم الفستان : {{$value->size[0]}}</h5>

                                <p class="card-text" style="margin: 0;">{{$value->description??'-'}}</p>
                                {{--                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                            </div>
                        </div>
                    </div>
                    @break($loop->index==2)
                @endforeach

            </div>

            <hr>

            <h3 class="text-center">فستان السهرة الاكثر طلبا</h3>
            <hr>

            <div class="row">
                @foreach($party as $value)
                    <div class="col-md-4">
                        <div class="card" style="">
                            @if($value->file=='')
                                <img alt="Image" src="{{ asset('assets/images/logo.png') }}" class="card-img-top">
                            @else
                                <img alt="Image" src="{{ asset('images/').'/'.$value->file}}"
                                     class="card-img-top">
                            @endif
                            {{--                            <img class="card-img-top" src="#" alt="Card image cap">--}}
                            <div class="card-body m-0">
                                <h5 class="card-title" style="margin: 0;">اسم الفستان : {{$value->name}}</h5>
                                <h5 class="card-title" style="margin: 0;">سعر الفستان : {{$value->price}}</h5>
                                <h5 class="card-title" style="margin: 0;">موديل الفستان : {{$value->model}}</h5>
                                <h5 class="card-title" style="margin: 0;">كود الفستان : {{$value->code}}</h5>
                                <h5 class="card-title" style="margin: 0;">حجم الفستان : {{$value->size[0]}}</h5>
                                لون الفستان :
                                <h5 class="card-title"
                                    style="margin: 0; background-color: {{$value->color}};color: {{$value->color}}"> {{$value->color}}</h5>
                                <p class="card-text" style="margin: 0;">{{$value->description??''}}</p>
                            </div>
                        </div>
                    </div>
                    @break($loop->index==2)
                @endforeach

            </div>

            <hr>

            <h3 class="text-center text-break">الاكسسوار الاكثر طلبا</h3>
            <hr>
            <div class="row">
                @foreach($accessory_ as $value)
                    <div class="col-md-4">
                        <div class="card" style="">
                            @if($value->file=='')
                                <img alt="Image" src="{{ asset('assets/images/logo.png') }}" class="card-img-top">
                            @else
                                <img alt="Image" src="{{ asset('images/').'/'.$value->file}}"
                                     class="card-img-top">
                            @endif
                            {{--                            <img class="card-img-top" src="#" alt="Card image cap">--}}
                            <div class="card-body m-0">
                                <h5 class="card-title" style="margin: 0;">اسم الاكسسوار : {{$value->name}}</h5>
                                <h5 class="card-title" style="margin: 0;">سعر الاكسسوار : {{$value->price}}</h5>
                                <h5 class="card-title" style="margin: 0;">موديل الاكسسوار : {{$value->model}}</h5>
                                <h5 class="card-title" style="margin: 0;">كود الاكسسوار : {{$value->code}}</h5>
                                لون الاكسسوار :
                                <h5 class="card-title"
                                    style="margin: 0; background-color: {{$value->color}};color: {{$value->color}}"> {{$value->color}}</h5>

                                <p class="card-text" style="margin: 0;">{{$value->description}}</p>
                                {{--                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                            </div>
                        </div>
                    </div>
                    @break($loop->index==2)
                @endforeach

            </div>


            <div class="row">

                <div class="col-md-6">
                    <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist" style="margin-top: 15px" >

                        <li class="nav-item">
                            <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                               aria-controls="parents" aria-selected="true">تقارير وملفات</a>
                        </li>

                    </ul>
                    <table class="table table-info text-center">
                        <thead>
                        <tr>
                            <th scope="col">انواع التقارير</th>
                            <th scope="col">رؤية التقرير للطباعة</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">تقرير عن البضاعه المتوفرة</th>
                            <td>انقر هنا</td>

                        </tr>
                        <tr>
                            <th scope="col">تقرير عن البضاعه المحجوزة</th>
                            <td>انقر هنا</td>

                        </tr>
                        <tr>
                            <th scope="col">تقرير عن اسعار المنتجات</th>
                            <td>انقر هنا</td>

                        </tr>
                        <tr>
                            <th scope="col">تقرير عن البضاعه المباعه سنويا</th>
                            <td>انقر هنا</td>

                        </tr>
                        <tr>
                            <th scope="col">التقرير المالي الاسبوعي</th>
                            <td>انقر هنا</td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-tabs" id="add_yatem_tab" role="tablist" style="margin-top: 15px" >

                        <li class="nav-item">
                            <a class="nav-link active show" id="parents-tab" data-toggle="tab" href="#parents" role="tab"
                               aria-controls="parents" aria-selected="true">البوم الصور</a>
                        </li>

                    </ul>

                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{asset('assets/images/58636.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/58633.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/40done_0.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/32dfg_1.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/20done_0.png')}}">

                        </div>


                        <div class="item">
                            <img src="{{asset('assets/images/58636.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/58633.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/40done_0.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/32dfg_1.png')}}">

                        </div>
                        <div class="item">
                            <img src="{{asset('assets/images/20done_0.png')}}">

                        </div>


                    </div>
                </div>

                <hr>
            </div>


        </div>
    </div>


@endsection


@section('js')
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
          integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
          integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                nav: false,
                dots: true,
                rtl: true,
                margin: 20,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 4
                    },
                    1000: {
                        items: 4
                    }
                }

            });

            // $('.owl-carousel').owlCarousel({
            //     loop: true,
            //     autoplay: true,
            //     autoplayTimeout: 3000,
            //     nav: false,
            //     dots: true,
            //     rtl: true,
            //     margin: 20,
            //     responsive: {
            //         0: {
            //             items: 2
            //         },
            //         600: {
            //             items: 4
            //         },
            //         1000: {
            //             items: 4
            //         }
            //     }
            //
            // });

        });

    </script>

@endsection
