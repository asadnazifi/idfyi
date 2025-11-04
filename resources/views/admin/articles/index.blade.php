@extends('admin.layout.main')
@section('title','لیست مقالات')

@section('content')
<div class="aidify-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-light">لیست مقالات</h4>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-electric">+ مقاله جدید</a>
    </div>

    <form method="GET" class="row mb-3">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control"
                   placeholder="جستجوی عنوان..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">جستجو</button>
        </div>
    </form>

    <table class="table table-dark table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>عنوان</th>
                <th>دسته</th>
                <th>وضعیت</th>
                <th>تاریخ</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->category->name ?? '-' }}</td>
                <td>
                    @if($item->is_published)
                        <span class="badge bg-success">منتشر شده</span>
                    @else
                        <span class="badge bg-secondary">پیش‌نویس</span>
                    @endif
                </td>
                <td>{{ jdate($item->created_at)->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('admin.articles.edit',$item->id) }}" class="btn btn-sm btn-outline-info">ویرایش</a>
                    <form action="{{ route('admin.articles.destroy',$item->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('حذف شود؟')" class="btn btn-sm btn-outline-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
</div>
@endsection
