@extends('layouts.app')

@section("content")
    <section class="height-80 text-center">
        <div class="container ">


            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2>تسجيل حساب جديد</h2>
                    <p class="lead">
                        مرحبا بك، قم بادخال بياناتك هنا
                    </p>
                    <form action="{{route("register")}}" method="post">
                        @if (session()->has("error"))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! session()->get("error")  !!}</li>
                                </ul>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="name" value="{{request()->old("name")}}" placeholder="الاسم">
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <input type="text" name="last_name" value="{{request()->old("last_name")}}" placeholder="الاسم الاخير">--}}
{{--                            </div>--}}
                            <div class="col-md-12">
                                <input type="text" name="email" value="{{request()->old("email")}}" placeholder="البريد الالكتروني">
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password" placeholder="كلمة المرور">
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn--primary type--uppercase" type="submit">تسجيل</button>
                            </div>

                        </div>
                            <!--end of row-->
                    </form>
                    <span class="type--fine-print block"> لديك حساب ؟
                                <a href="{{route("login")}}">تسجيل الدخول</a>
                            </span>
                </div>
            </div>        </div>
        <!--end of container-->
    </section>
@endsection
