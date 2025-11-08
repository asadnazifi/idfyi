@extends('front.layout.main')
@push('style')
    <link rel="stylesheet" href="{{ asset('front/styles/components/login.css') }}">
@endpush
@section('title', 'ثبت نام')
@section('content')
    <div class="box_login flex justfi-center">
        <div class="content-login ">
            <div class="header-login text-center BYekan">
                <h1>فرم ثبت نام</h1>
            </div>
            <div class="form-login">
                <form action="{{ route('front.rigester.submit') }}" method="post">
                    @csrf
                    <div class="form-grup">
                        <label for="lastname">نام</label>
                        <input type="text" id="lastname" name="lastname" placeholder="اسعد" value="{{ old('lastname') }}" required>
                    </div>
                    <div class="form-grup">
                        <label for="farstname">نام خانوادگی</label>
                        <input type="text" id="farstname" name="farstname" placeholder="نظیفی" value="{{ old('farstname') }}" required>
                    </div>
                    <div class="form-grup">
                        <label for="email">ایمیل خود را وارد کنید</label>
                        <input type="email" id="email" name="email" placeholder="export@gmail.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-grup">
                        <label for="password">رمز عبور خود را وارد کنید</label>
                        <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد کنید" required>
                    </div>
                    <div class="form-grup">
                        <label for="password">تکرار عبور خود را وارد کنید</label>
                        <input type="password" id="password1" name="password_confirmation" placeholder="تکرار رمز عبور خود را وارد کنید" required>
                    </div>
                    <div class="form-grup mt-10">

                        <button class="btn Peyda-B w-100 bg-bt color-white">ثبت نام</button>
                    </div>
                </form>
            </div>
            <div class="footer-login">
                <hr>
                <div class="forget_password BYekan">
                    <a style="float: left;" href="{{ route('front.login') }}"> حساب کاربری دارم</a>

                </div>
            </div>
        </div>
    </div>

@endsection
