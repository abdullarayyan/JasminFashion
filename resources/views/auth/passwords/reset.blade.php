@extends('layouts.app')

@section('content')
    <section class="height-80 text-center">
        <div class="container ">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2>إعادة تعيين كلمة المرور</h2>
                    <p class="lead">
                        قم بإدخال كلمة المرور الجديده
                    </p>
                    <form action="{{route("password.update")}}" method="post">
                        @if (session()->has("error"))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{session()->get("error")}}</li>
                                </ul>
                            </div>
                        @endif
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="password" placeholder="كلمة المرور">
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="password_confirmation" placeholder="تأكيد كلمة المرور">
                            </div>

                        </div>
                        <div class="row mt--1">
                            <div class="col-md-12">
                                <button class="btn btn--primary type--uppercase" type="submit">تأكيد</button>
                            </div>

                        </div>
                        <!--end of row-->
                    </form>
{{--                    @if(session()->has("reset_password"))--}}
{{--                        <span class="type--fine-print block">تغيير رقم المحمول ؟--}}
{{--                                <a href="{{route("customers.forgot")}}">رجوع</a>--}}
{{--                            </span>--}}
{{--                    @else--}}
{{--                        <span class="type--fine-print block">تغيير رقم المحمول ؟--}}
{{--                                <a href="{{route("customers.register")}}">رجوع</a>--}}
{{--                            </span>--}}
{{--                    @endif--}}
                </div>
            </div>        </div>
        <!--end of container-->
    </section>
@endsection
