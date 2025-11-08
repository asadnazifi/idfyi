@extends('front.layout.main')
@push('style')
<link rel="stylesheet" href="{{ asset('front/styles/components/login.css') }}">
@endpush
@section('title', 'ورود')

@section('content')
    <div class="box_login flex justfi-center">
        <div class="content-login ">
            <div class="header-login text-center BYekan">
                <h1>فرم ورود</h1>
            </div>
            <div class="form-login">
                <form action="{{ route('front.login.submit') }}" method="POST">
                    @csrf
                    <div class="form-grup">
                        <label for="username">نام کاربری</label>
                        <input type="text" id="username" name="username" placeholder="ایمیل یا نام کاربری خود را وارد کنید" required>
                    </div>
                    <div class="form-grup">
                        <label for="password"> رمز عبور</label>
                        <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد کنید" required>
                    </div>
                    <div class="BYekan">
                        <input type="checkbox" id="remaber_token" name="remember">
                        <label for="remaber_token"> من را به خاطر بسپار </label>
                    </div>
                    <div class="form-grup mt-10">

                        <button class="btn Peyda-B w-100 bg-bt color-white">ورود</button>
                    </div>
                </form>
            </div>
            <div class="footer-login">
                <hr>
                <div class="forget_password BYekan">
                    <a href="#">رمز عبور خود را فراموش کردم</a>
                    <a style="float: left;" href="{{ route('front.register') }}"> ثبت نام</a>

                </div>
            </div>
        </div>
    </div>

@endsection
