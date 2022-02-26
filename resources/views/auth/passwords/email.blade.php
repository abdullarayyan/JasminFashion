@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="height-80 text-center">
            <div class="container ">
                <div class="row">
                    <div class="col-md-7 col-lg-5">
                        <h2>نسيت كلمة المرور ؟</h2>
                        <p class="lead">
                            قم بإدخال رقم المحمول او البريد الالكتروني
                        </p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route("password.email")}}" method="post">
                            @if ($errors->any() || ($errorMessage=session('errorMessage')))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        @isset($errorMessage)
                                            <li>{!! $errorMessage !!}</li>
                                        @endisset
                                    </ul>
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ادخل البريد الالكتروني">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mt--1">
                                <div class="col-md-12">
                                    <button class="btn btn--primary type--uppercase" type="submit">تأكيد</button>
                                </div>

                            </div>
                            <!--end of row-->
                        </form>
                        <span class="type--fine-print block">ليس لديك حساب ؟
                                <a href="{{route("register")}}">سجل الان</a>
                            </span>
                        <span class="type--fine-print block">لديك حساب ؟
                                <a href="{{route("login")}}">تسجيل الدخول</a>
                            </span>
                    </div>
                </div>
            </div>
            <!--end of container-->
        </section>
    </div>
@endsection
