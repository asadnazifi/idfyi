@extends('admin.layout.main')
@section('title','ویرایش محصول')

@section('content')
<div class="aidify-container">
  <h4 class="text-light mb-4">ویرایش محصول</h4>

  <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-6 mb-3">
        <label>عنوان</label>
        <input name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
      </div>
      <div class="col-md-6 mb-3">
        <label>نوع محصول</label>
        <select name="type" class="form-control">
          <option value="physical" @selected($product->type == 'physical')>محصول فیزیکی</option>
          <option value="course" @selected($product->type == 'course')>دوره آموزشی</option>
          <option value="service" @selected($product->type == 'service')>پلن پشتیبانی</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label>دسته‌بندی</label>
        <select name="category_id" class="form-control">
          <option value="">— انتخاب دسته</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->id }}" @selected($cat->id == $product->category_id)>{{ $cat->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3 mb-3">
        <label>قیمت</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', (int)str_replace(',', '', $product->price)) }}" required>
      </div>
      <div class="col-md-3 mb-3">
        <label>قیمت تخفیف</label>
        <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price', $product->sale_price) }}">
      </div>

      <div class="col-md-12 mb-3">
        <label>توضیحات کوتاه</label>
        <textarea name="short_content" id="editor2" style="width: 100%; height: 200px;">{{ old('short_content', $product->short_content) }}</textarea>
      </div>

      <div class="col-md-12 mb-3">
        <label>توضیحات کامل</label>
        <textarea name="description" id="editor1" style="width: 100%; height: 200px;">{{ old('description', $product->description) }}</textarea>
      </div>

      <div class="col-md-12">
        <button class="btn btn-block btn-primary btn-flat mt-2">ذخیره تغییرات</button>
      </div>
    </div>
  </form>
</div>

@push('scripts')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
  $(function () {
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
  });
</script>
@endpush
@endsection