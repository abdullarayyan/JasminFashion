@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container ">


            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2 style="display: flex; justify-content: center">تسجيل حساب جديد</h2>
                    <p style="display: flex; justify-content: center" class="lead">
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
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" required
                                       name="email" value="{{request()->old("email")}}" placeholder="البريد الالكتروني">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       required name="password" placeholder="كلمة المرور">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password_confirmation" required
                                       placeholder="تأكيد كلمة المرور">
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn--primary type--uppercase" type="submit">تسجيل</button>
                            </div>

                        </div>
                        <!--end of row-->
                    </form>
                    <span style="display: flex; justify-content: center" class="type--fine-print block"> لديك حساب ؟
                                <a href="{{route("login")}}">تسجيل الدخول</a>
                            </span>
                </div>
            </div>
        </div>
    </div>
@endsection
