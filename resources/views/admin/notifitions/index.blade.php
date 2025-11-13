@extends('admin.layout.main')

@section('title', 'لیست نویفیکیشن ها')

@section('page_header')
    <h1>لیست نوتیفیکیشن ها</h1>
    <ol class="breadcrumb">
        <li class="">نوتیفیکیشن</li>
        <li class="active">لیست نوتیفیکیشن ها</li>
    </ol>
@endsection
@section('content')
    <div class="col-md-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">لیست نوتیفیکیشن</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">ایدی</th>
                            <th>عنوان</th>
                            <th>پیام</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                            <tr>
                                <td>{{ $notification->id }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>{{ Str::limit($notification->message, 200) }}</td>

                                {{-- تعیین گیرنده اعلان --}}
                                <td>
                                    @if($notification->user_id)
                                        {{ $notification->user->lastname ?? 'کاربر نامشخص' }}
                                    @else
                                        <span class="text-info">همه کاربران</span>
                                    @endif
                                </td>

                                {{-- تاریخ ایجاد اعلان (به صورت جلالی) --}}
                                <td>{{ jdate($notification->created_at)->format('Y/m/d H:i') }}</td>

                                <td>
                                    {{-- دکمه‌های عملیات --}}
                                    <a href="{{ route('admin.notifications.edit', $notification->id) }}"
                                        class="btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.notifications.delete', $notification->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"
                                            onclick="return confirm('آیا از حذف «{{ $notification->title }}» مطمئن هستید؟')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="pagination pagination-sm no-margin pull-right">
                    {{ $notifications->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
        <!-- /.box -->
        <!-- /.box -->
    </div>
@endsection
