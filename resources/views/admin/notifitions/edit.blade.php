@extends('admin.layout.main')

@section('title', 'ویرایش نوتیفیکشین')

@section('page_header')
    <h1>ویرایش نوتیفیکیشن </h1>
    <ol class="breadcrumb">
        <li class="">نوتیفیکیشن</li>
        <li class="active">ویرایش نوتیفیکیشن </li>
    </ol>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title text-light">ویرایش نوتیفیکیشن</h3>
            </div>

            <div class="box-body">
                <form action="{{ route('admin.notifications.update', $notification->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="text-light">عنوان اعلان</label>
                        <input type="text" name="title" value="{{ $notification->title }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-light">متن پیام</label>
                        <textarea name="message" class="form-control" rows="4">{{ $notification->message }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="text-light">لینک</label>
                        <input type="text" name="link" value="{{ $notification->link }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="text-light">گیرنده</label>
                        <select name="user_id" class="form-control">
                            <option value="">📢 همه کاربران</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $notification->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn aidify-btn-blue">ویرایش اعلان</button>
                </form>
            </div>
        </div>
    </div>
@endsection
