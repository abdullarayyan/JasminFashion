@extends('layouts.app')

@section('title', 'تسجيل الدخول')
@if(1==2)
@section('page_title', 'تسجيل الدخول')
@endif

@section('content')
    <section class="">
        <div class="container ">
            <div class="row">
                <div class="">
                    <h2 style="display: flex; justify-content: center">تسجيل الدخول</h2>
                    <p style="display: flex; justify-content: center" class="lead">
                        مرحبا بك، قم بادخال بياناتك هنا
                    </p>
                    <form action="{{route("login")}}" method="post">
{{--                        @include("customers.messages")--}}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="email"  class="form-control @error('email') is-invalid @enderror" required name="email" placeholder="ادخل بريدك الالكتروني">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="كلمة المرور">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn--primary type--uppercase" type="submit">دخول</button>
                            </div>
                        </div>
                        <!--end of row-->
                    </form>
                    <span style="display: flex; justify-content: center" class="type--fine-print block">ليس لديك حساب ؟
                                <a href="{{route("register")}}">سجل الان</a>
                            </span>
                    <span style="display: flex; justify-content: center" class="type--fine-print block">نسيت كلمة المرور ؟
                                <a href="{{route("password.request")}}">إستعادة كلمة المرور</a>
                            </span>
                </div>
            </div>
        </div>
        <!--end of container-->
    </section>
@endsection
