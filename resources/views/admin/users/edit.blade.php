@extends('admin.layout.main')

@section('content')
<section class="content-header">
    <h1>ویرایش کاربر {{ $user->lastname }}</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label>نام</label>
                    <input type="text" name="name" value="{{ old('name', $user->lastname) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>شماره تماس</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>نقش</label>
                    <select name="role" class="form-control">
                        <option value="user" {{ $user->role=='user' ? 'selected' : '' }}>کاربر</option>
                        <option value="developer" {{ $user->role=='developer' ? 'selected' : '' }}>توسعه‌دهنده</option>
                        <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>مدیر</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>وضعیت</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $user->status=='active' ? 'selected' : '' }}>فعال</option>
                        <option value="inactive" {{ $user->status!='active' ? 'selected' : '' }}>غیرفعال</option>
                    </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-default">بازگشت</a>
            </div>
        </form>
    </div>
</section>
@endsection
