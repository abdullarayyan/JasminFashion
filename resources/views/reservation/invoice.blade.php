@extends("layouts.app")
<style>
    <
    link rel

    =
    "stylesheet"
    href

    =
    "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity

    =
    "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin

    =
    "anonymous"
    >

</style>

@section('content')

    <div class="card-section">
        <div class="header">
            <span class="card_title"></span>
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
        {{--        <div class="alert alert-info mt-3" role="alert">--}}
        {{--            لا يوجد سجل لهذا الحجز--}}
        {{--        </div>--}}

        <div class="hed" style="padding: 0!important;">
            <p>jasmin Fashion</p>
            <p>Nablus</p>
            <p>jasminFashion@gmail.com</p>
        </div>
        <hr>

        <div class="info">
            <h1 style="float: left;font-size: larger">فاتورة المشتريات</h1>
            <br>
        </div>
        <br>
        <div class="row">
            <div class="information" style="display: flex;justify-content: space-between;width: 100%;">

                <div class="row" style="display: flex;align-items: baseline;    margin-right: 29px; width: 40%">
                    <h3 style="font-size: 15px">المشتري</h3>
                    <div class="cc" style="margin-right: 15px;">
                        <h6>الاسم: <span style="font-size:larger;color: black">{{$customer->customer_name}} </span></h6>
                        <h6>المدينة:<span style="font-size:larger;color: black">{{$customer->from}} </span></h6>
                        <h6>الهاتف: <span style="font-size:larger;color: black">{{$customer->mobile}} </span></h6>
                    </div>
                </div>
                <div class="row xx" style="    display: flex;
                            flex-direction: column;
                            width: 30%;">
                    <div style="display: flex;
                        align-items: baseline;
                        justify-content: space-around; ">
                        <h3 style="font-size: 15px">رقم الفاتورة </h3>
                        <h6>{{'#'.'0000'.$customer->id}}</h6>
                    </div>

                    <div style="display: flex;
                        align-items: baseline;
                        justify-content: space-around;">
                        <h3 style="font-size: 15px">التاريخ</h3>
                        <h6>{{now()->format('Y-m-d')}}</h6>
                    </div>
                    <div style="display: flex;
                            align-items: baseline;
                            justify-content: space-around;">
                        <h3 style="font-size: 15px">اسم الموظف:</h3>
                        <h6>{{Auth::user()->name}}</h6>
                    </div>


                </div>
            </div>

        </div>
        <div style="display: none">
            {{$acc_dress=\App\Models\Accessory::query()->where('code',$customer->dress_code_acc)->first()??''}}
            <br>
        </div>
        <div style="display: none">
            {{$acc_party=\App\Models\Accessory::query()->where('code',$customer->party_code_acc)->first()??''}}
            <br>
        </div>
        <div style="display: none">
            {{$party=\App\Models\Party::query()->where('code',$customer->party_code)->first()??''}}
            <br>
        </div>
        <div style="display: none">
            {{$dress=\App\Models\Product::query()->where('code',$customer->dress_code)->first()??''}}
            <br>
        </div>
{{--{{dd($dress)}}}--}}
        <table class="table">
            <thead>
            <tr style="    border:solid 1px black !important ;">
                <th scope="col">الوصف</th>
                <th scope="col">الكود</th>
                <th scope="col">السعر</th>
                <th scope="col">الاجمالي</th>
            </tr>
            </thead>
            <tbody>
            @if($dress)
                <tr style="    border:solid 1px black !important ;">
                    <th scope="col">{{$dress->name??''}}</th>
                    <th scope="col">{{$customer->dress_code??''}}</th>
                    <th scope="col">{{$customer->dress_price??''}}</th>
                    <th scope="col"></th>
                </tr>
            @endif
            @if($party)
                <tr style="    border:solid 1px black !important ;">
                    <th scope="col">{{$party->name??''}}</th>
                    <th scope="col">{{$customer->party_code}}</th>
                    <th scope="col">{{$customer->party_price}}</th>
                    <th scope="col"></th>
                </tr>
            @endif
            @if($acc_dress)
                <tr style="    border:solid 1px black !important ;">
                    <th scope="col">{{$acc_dress->name??''}}</th>
                    <th scope="col">{{$customer->dress_code_acc}}</th>
                    <th scope="col">{{$customer->party_price_acc}}</th>
                    <th scope="col"></th>
                </tr>
            @endif
            @if($acc_party)
                <tr style="    border:solid 1px black !important ;">
                    <th scope="col">{{$acc_party->name??''}}</th>
                    <th scope="col">{{$customer->dress_code_acc}}</th>
                    <th scope="col">{{$customer->party_price_acc}}</th>
                    <th scope="col"></th>
                </tr>
            @endif

                <tr style="border: none">
                <th scope="col" colspan="2" style="border: none"></th>
                <th scope="col" style="    border-top:solid 1px black !important ;">الصافي</th>
                <th scope="col" style="    border-top:solid 1px black !important ;">{{$customer->party_price_acc}}</th>
            </tr>
            <tr style="border: none">
                <th scope="col" colspan="2" style="border: none"></th>
                <th scope="col">المدفوع</th>
                <th scope="col"></th>
            </tr>
            <tr style="border: none">
                <th scope="col" colspan="2" style="border: none"></th>
                <th scope="col">المتبقي</th>
                <th scope="col">{{$customer->party_price_acc}}</th>
            </tr>
            </tbody>
        </table>
    </div>

    {{--        <div class="row">--}}
    {{--            <div class="col-md-6">--}}
    {{--                <h3>المشتري   <h6><span> الاسم:{{$customer->customer_name}}</span></h6></h3>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-6">--}}

    {{--            </div>--}}
    {{--        </div>--}}
    </div>

@endsection

@section('js')
@endsection
