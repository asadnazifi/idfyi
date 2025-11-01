@extends('admin.layout.main')

@section('content')
<section class="content-header">
    <h1>مدیریت دسته‌بندی‌ها</h1>
</section>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border d-flex justify-content-between align-items-center">
            <h3 class="box-title">لیست دسته‌ها</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="background-color:#4D6AFF;border:none">
                <i class="fa fa-plus"></i> افزودن دسته جدید
            </a>
        </div>

        <div class="box-body table-responsive no-padding">
            <table class="table table-bordered">
                <thead >
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>نام دسته</th>
                        <th>نامک (Slug)</th>
                        <th>والد</th>
                        <th>تاریخ ایجاد</th>
                        <th style="width:150px;">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->parent ? $category->parent->name : '—' }}</td>
                            <td>{{ jdate($category->created_at)->format('Y/m/d') }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('حذف شود؟');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">هیچ دسته‌ای یافت نشد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="box-footer text-center">
            {{ $categories->links() }}
        </div>
    </div>
</section>
@endsection

