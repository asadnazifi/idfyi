@extends('admin.layout.main')
@section('title','ایجاد محصول')

@section('content')
<div class="aidify-container">
  <h4 class="text-light mb-4">ایجاد محصول جدید</h4>

  <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label>عنوان</label>
        <input name="title" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label>نوع محصول</label>
        <select name="type" class="form-control">
          <option value="physical">محصول فیزیکی</option>
          <option value="course">دوره آموزشی</option>
          <option value="service">پلن پشتیبانی</option>
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
      <div class="col-md-3 mb-3">
        <label>قیمت</label>
        <input type="number" name="price" class="form-control" required>
      </div>
      <div class="col-md-3 mb-3">
        <label>قیمت تخفیف</label>
        <input type="number" name="sale_price" class="form-control">
      </div>
      <div class="col-md-6 mb-6">
        <label>تصویر محصول</label>
        <input type="file" name="photo" class="form-control">
      </div>
      <div class="col-md-12 mb-3">
        <label>توضیحات کوتاه</label>
            <div class="box-body pad">
              <form>
                <textarea name="short_content" id="editor2" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </form>
            </div>
      </div>
      <div class="col-md-12 mb-3">
        <label>توضیحات کامل</label>
            <div class="box-body pad">
              <form>
                <textarea name="description" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </form>
            </div>
      </div>
      <div class="col-md-12">
        <button class="btn btn-primary w-100 py-2">ثبت محصول</button>
      </div>
    </div>
  </form>
</div>
@push('scripts')
    <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
  })
</script>

@endpush
@endsection
