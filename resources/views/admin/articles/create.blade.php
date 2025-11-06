@extends('admin.layout.main')
@section('title','ایجاد مقاله')

@section('content')
<div class="aidify-container">
  <h4 class="text-light mb-4">ایجاد مقاله جدید</h4>

  <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-8 mb-3">
        <label>عنوان</label>
        <input name="title" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label>وضعیت</label>
        <select name="is_published" class="form-control">
          <option value="0">پیش‌نویس</option>
          <option value="1">منتشر شود</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label>دسته‌بندی</label>
        <select name="category_id" class="form-control">
          <option value="">— انتخاب دسته</option>
          @foreach($categories as $cat)
          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label>تصویر اصلی</label>
        <input type="file" name="thumbnail" class="form-control">
      </div>
        <div class="col-md-6 mb-3">
        <label>توضیحات کوتاه</label>
        <textarea id="editor2" name="short_content"></textarea>
      </div>
      <div class="col-md-12 mb-3">
        <label>محتوا</label>
        <textarea id="editor" name="content"></textarea>
      </div>
      <div class="col-md-12">
        <button class="btn btn-primary w-100 py-2">ثبت مقاله</button>
      </div>
    </div>
  </form>
</div>

@push('scripts')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('editor')
CKEDITOR.replace('editor2')
</script>
@endpush
@endsection
