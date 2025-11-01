@extends('admin.layout.main')

@section('content')
<section class="content-header">
    <h1>افزودن دسته جدید</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label>نام دسته</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>نامک (اختیاری)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="به صورت slug (انگلیسی)">
                </div>

                <div class="form-group">
                    <label>توضیحات (اختیاری)</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>دسته والد (اختیاری)</label>
                    <select name="parent_id" class="form-control">
                        <option value="">— بدون والد —</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="background-color:#4D6AFF;border:none">
                    <i class="fa fa-save"></i> ذخیره دسته
                </button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-default">
                    بازگشت
                </a>
            </div>
        </form>
    </div>
</section>
@endsection
