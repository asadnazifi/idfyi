@extends('admin.layout.main')

@section('title', 'ساخت نوتیفیکیشن')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('page_header')
    <h1>ساخت نوتیفیکیشن </h1>
    <ol class="breadcrumb">
        <li class="">نوتیفیکیشن</li>
        <li class="active">ساخت نوتیفیکیشن </li>
    </ol>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title text-light">ارسال نوتیفیکیشن جدید</h3>
            </div>

            <div class="box-body">
                <form action="{{ route('admin.notifications.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="text-light">عنوان اعلان</label>
                        <input type="text" name="title" class="form-control" placeholder="مثلاً: اطلاعیه جدید Aidify"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="text-light">متن پیام</label>
                        <textarea name="message" class="form-control" rows="4"
                            placeholder="متن اعلان را وارد کنید..."></textarea>
                    </div>

                    <div class="form-group">
                        <label class="text-light">لینک</label>
                        <input type="text" name="link" class="form-control" placeholder="در صورت نیاز لینک را وارد کنید">
                    </div>

                    <div class="form-group">
                        <label class="text-light">گیرنده</label>
                        <select name="user_id" id="user-select" class="form-control" style="width:100%;">
                            <option value="">📢 همه کاربران</option>
                        </select>
                    </div>

                    <button type="submit" class="btn aidify-btn-blue">ارسال اعلان</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#user-select').select2({
                placeholder: "جستجو نام یا نام‌خانوادگی کاربر...",
                allowClear: true,
                ajax: {
                    url: "{{ route('admin.users.search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return { q: params.term };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map(function (user) {
                                return { id: user.id, text: user.name + ' ' + user.lastname };
                            })
                        };
                    },
                    cache: true
                },
                language: {
                    inputTooShort: function () { return "نام کاربر را وارد کنید..."; },
                    searching: function () { return "در حال جستجو..."; },
                    noResults: function () { return "کاربری یافت نشد"; },
                }
            });
        });
    </script>
@endpush
