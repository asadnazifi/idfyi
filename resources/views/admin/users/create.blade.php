@extends('admin.layout.main')

@section('content')
<section class="content-header">
    <h1>افزودن کاربر جدید</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label>نام</label>
                    <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>نام خانوادگی</label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>شماره تماس</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>رمز عبور</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>تکرار رمز عبور</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <label>نقش</label>
                    <select name="role" class="form-control">
                        <option value="user">کاربر معمولی</option>
                        <option value="developer">توسعه‌دهنده</option>
                        <option value="admin">مدیر</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>اعتبار حساب (Balance)</label>
                    <input type="number" name="balance" step="0.01" value="{{ old('balance') ?? 0 }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>وضعیت</label>
                    <select name="status" class="form-control">
                        <option value="active">فعال</option>
                        <option value="inactive">غیرفعال</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>عکس پروفایل</label>
                    <input type="file" name="photo" class="form-control">
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره کاربر جدید</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-default">بازگشت</a>
            </div>
        </form>
    </div>
</section>
@endsection
