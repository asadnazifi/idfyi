@extends('admin.layout.main')

@section('title', 'لیست کاربران')

@section('page_header')
    <h1>لیست کاربران</h1>
    <ol class="breadcrumb">
        <li class="">کاربران</li>
        <li class="active">لیست کاربران</li>
    </ol>
@endsection

@section('content')
    <div class="col-md-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">لیست کاربران</h3>

                <div class="box-tools">
                    <form action="{{ route('admin.users.index') }}" method="GET">
                        <div class="input-group input-group-sm" style="width: 180px;">
                            <input type="text" name="table_search" value="{{ $search ?? '' }}"
                                class="form-control pull-right" placeholder="جستجو...">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">ایدی</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>نقش</th>
                            <th>شماره تماس</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                @php
                                    $roles = [
                                        'admin' => 'مدیر',
                                        'developer' => 'توسعه‌دهنده',
                                        'user' => 'کاربر',
                                    ];
                                @endphp

                                <td>
                                    <span class="badge
                                                    @if($user->role == 'admin') bg-green
                                                    @elseif($user->role == 'developer') bg-light-blue
                                                    @else bg-gray @endif">
                                        {{ $roles[$user->role] ?? $user->role }}
                                    </span>
                                </td>
                                <td>{{ $user->phone ?? '—' }}</td>
                                <td>
                                    @if($user->status == 'active' || $user->status == 1)
                                        <span class="badge bg-green">فعال</span>
                                    @else
                                        <span class="badge bg-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>{{ $user->jalali_created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"
                                            onclick="return confirm('آیا از حذف {{ $user->name }} مطمئن هستید؟')">
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
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
        <!-- /.box -->
        <!-- /.box -->
    </div>
@endsection
