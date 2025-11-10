@extends('front.layout.main')
@push('style')
    <link rel="stylesheet" href="{{ asset('front/styles/components/profile.css') }}">
@endpush
@section('title', 'ویرایش اطلاعات')

@section('content')
    <div class="content">
        <div class="profile mt-20">
            @include('front.profile.nav-dashbord')
            <div class="content-profile BYekan">
                <h2>ویرایش حساب کاربری</h2>
                <div class="form-edit flex justfi-center">
                    <form action="{{ route('front.profile.update') }}" method="POST" class="w-50">
                        @csrf
                        <div class="edit-form flex" >
                            <div class="w-50">
                                <label for="lastname">نام </label>
                                <input type="text" name="lastname" id="lastname"
                                    value="{{ old('lastname', $user->lastname) }}">
                            </div>
                            <div class="w-50">
                                <label for="farstname">نام خانوادگی</label>
                                <input type="text" name="farstname" id="farstname"
                                    value="{{ old('farstname', $user->farstname) }}">
                            </div>
                        </div>
                        <div class="email-edit">
                            <div>
                                <label for="email">ایمیل</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" disabled>
                            </div>

                        </div>
                        <div class="edit-form flex">
                            <div class="w-50">
                                <label for="password">رمزعبور (جدید)</label>
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="w-50">
                                <label for="password">تکرار رمز عبور</label>
                                <input type="password" name="password_confirmation" id="password">
                            </div>
                        </div>
                        <div>
                            <button class="btn bg-bt Peyda-B"> ذخیره تغیرات</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
