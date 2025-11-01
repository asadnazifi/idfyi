@extends('admin.layout.main')

@section('content')
<section class="content-header">
    <h1>ویرایش دسته</h1>
</section>

<section class="content">
    @include('admin.layout.messages')
    <div class="box box-primary">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label>نام دسته</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>نامک (Slug)</label>
                    <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>توضیحات</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label>دسته والد</label>
                    <select name="parent_id" class="form-control">
                        <option value="">— بدون والد —</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="background-color:#4D6AFF;border:none">
                    <i class="fa fa-save"></i> بروزرسانی
                </button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-default">بازگشت</a>
            </div>
        </form>
    </div>
</section>
@endsection
