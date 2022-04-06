@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('page_title', 'الصفحة الرئيسية')
<style>
    /*.owl-carousel.owl-theme {*/
    /*    display: flex !important;*/
    /*    justify-content: center !important;*/
    /*}*/

    /*.owl-stage-outer {*/
    /*    margin-right: 20px !important;*/
    /*}*/

    /*.owl-stage-outer .owl-stage div {*/
    /*    margin-left: 10px !important;*/
    /*}*/

    /*.owl-nav button {*/
    /*    font-size: 36px !important;*/
    /*    position: absolute;*/
    /*    top: 0;*/
    /*    bottom: 0;*/
    /*    height: auto;*/
    /*}*/

    /*.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot {*/
    /*    padding: 10px !important;*/
    /*}*/

    /*.owl-nav button:first-child {*/
    /*    right: -15px;*/
    /*}*/

    /*.owl-nav button:last-child {*/
    /*    left: -15px;*/
    /*}*/
</style>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}


{{--<link rel="stylesheet" type="text/css" href="https://ihouse.fra1.digitaloceanspaces.com/css/owl.carousel.min.css"/>--}}
{{--<script src="https://ihouse.fra1.digitaloceanspaces.com/js/owl.carousel.min.js"></script>--}}
<style>

</style>
@section('content')

    <div class="card-section">

        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="{{asset('assets/images/58636.png')}}">

            </div>
            <div class="item">
                <img src="{{asset('assets/images/58633.png')}}">

            </div> <div class="item">
                <img src="{{asset('assets/images/40done_0.png')}}">

            </div> <div class="item">
                <img src="{{asset('assets/images/32dfg_1.png')}}">

            </div> <div class="item">
                <img src="{{asset('assets/images/20done_0.png')}}">

            </div>



            <div class="item">
                <img src="{{asset('assets/images/58636.png')}}">

            </div>
            <div class="item">
                <img src="{{asset('assets/images/58633.png')}}">

            </div> <div class="item">
                <img src="{{asset('assets/images/40done_0.png')}}">

            </div> <div class="item">
                <img src="{{asset('assets/images/32dfg_1.png')}}">

            </div> <div class="item">
                <img src="{{asset('assets/images/20done_0.png')}}">

            </div>




        </div>
    </div>
@endsection


@section('js')
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay:true,
                autoplayTimeout:3000,
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
