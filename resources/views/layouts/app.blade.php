<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Aytam App">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">

    <title>Jasmin Fashion | @yield('title')</title>

    <link rel="shortcut icon" href="{{ url('assets/images/logo.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <!-- Plugins -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"></link>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/sanfrancisco-font.css?v=2" rel="stylesheet"
          type="text/css" media="all"/>

    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/stack-interface.css?v=1" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/lightbox.min.css?v=1" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/socicon.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/flickity.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/jquery.steps.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/iconsmind.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/ihouse_icons.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/sanfrancisco-font.css?v=2" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/theme.css?v=1" rel="stylesheet" type="text/css"
          media="all"/>
    <link rel="stylesheet" type="text/css" href="https://ihouse.fra1.digitaloceanspaces.com/css/owl.carousel.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://ihouse.fra1.digitaloceanspaces.com/css/owl.theme.default.min.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="57x57" href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="https://ihouse.fra1.digitaloceanspaces.com/apple-icon-180x180.png">

    <style>
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            font-family: "SF Pro AR", "SF Pro Gulf", "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
        }

        ::-moz-placeholder { /* Firefox 19+ */
            font-family: "SF Pro AR", "SF Pro Gulf", "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
        }

        :-ms-input-placeholder { /* IE 10+ */
            font-family: "SF Pro AR", "SF Pro Gulf", "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
        }

        :-moz-placeholder { /* Firefox 18- */
            font-family: "SF Pro AR", "SF Pro Gulf", "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
        }
    </style>

    @yield('css')
    <link href="https://ihouse.fra1.digitaloceanspaces.com/css/custom.css?v=0.1.0" rel="stylesheet" type="text/css"
          media="all"/>

</head>

<body>

@include('layouts.includes.header')

<section id="app" class="main-section">
{{--@auth--}}
{{--    @include('layouts.includes.rightNav')--}}
{{--@endauth--}}

<!-- Page -->
    <section class="left-section @auth auth @endauth">
        @yield('content')
    </section>
    <!-- End Page -->

    <!-- Core  -->
    <script src="{{ url('/js/app.js') }}"></script>

    <!-- Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    <script src="{{ url('js/common.js') }}"></script>
    <script src="{{ url('js/pages/main/app.js') }}"></script>

    <!-- Page -->

    @yield('js')
</section>

<section id="loading" style="background-color: #fcefba">
    <div id="loading-content">

<div class="row">
</div>

        <footer class="footer-1 text-center-xs space--xs " style="padding-top: 20px;padding-bottom: 0px; background-color: #fcefba">
            <div class="container">
                <div class="row" style="justify-content: center">
{{--                    <div class="col-sm-4 text-right">--}}


{{--                    </div>--}}
                    <div class="col-sm-8  text-center">
                        <ul class="social-list list-inline list--hover">
                            <li>
                                <a href="https://www.facebook.com/jasmineFashionGroup1/?ref=page_internal" target="_blank">
                                    <i class="socicon socicon-facebook icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="socicon socicon-twitter icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/jasmine.fash/?fbclid=IwAR3L7oHXKpfr9b4_lmuA860eMv9qASuheNsj9Q398DDmeHwkxtw70Yq-FIk" target="_blank">
                                    <i class="socicon socicon-instagram icon icon--xs"></i>
                                </a>
                            </li>

{{--                            <li>--}}
{{--                                <a href="https://locate.apple.com/il/en/sales/?pt=1&amp;lat=31.8991848&amp;lon=35.2054965&amp;address=Ramallah" target="_blank">--}}
{{--                                    <i class="socicon socicon-apple icon icon--xs"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li><a target="_blank" dir="ltr" href="https://wa.me/+972569103050">+970 (56) 910 3050</a> <i class="fab fa-whatsapp"></i></li>--}}
{{--                            <li><a href="tel:000000000">0-000-000000</a> <i class="fa fa-phone-square"></i></li>--}}
                            <li><a style="color:#4a90e2;font-weight: bold" href="https://s11819879.wixsite.com/website"  target="_blank">موقعنا الالكتروني</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </footer>


    </div>
</section>

@include('layouts.includes.notifications')
</body>

</html>
