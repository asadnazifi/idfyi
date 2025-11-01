@extends('admin.layout.main')
@section('title','لیست محصولات')

@section('content')
<div class="aidify-container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-light">لیست محصولات</h4>
    <a href="{{ route('admin.products.create') }}" class="btn btn-electric">+ محصول جدید</a>
  </div>

  <form method="GET" class="row mb-3">
    <div class="col-md-3">
      <input type="text" name="search" class="form-control" placeholder="جستجو عنوان..." value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
      <select name="type" class="form-control">
        <option value="">نوع محصول</option>
        <option value="physical" @selected(request('type')=='physical')>محصول فیزیکی</option>
        <option value="course" @selected(request('type')=='course')>دوره</option>
        <option value="service" @selected(request('type')=='service')>پلن</option>
      </select>
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
        <th>نوع</th>
        <th>قیمت</th>
        <th>تاریخ</th>
        <th>عملیات</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->title }}</td>
        <td>
          @if($item->type=='physical') فیزیکی
          @elseif($item->type=='course') دوره
          @else پلن پشتیبانی @endif
        </td>
        <td>{{ $item->price }} تومان</td>
        <td>{{ jdate($item->created_at)->format('Y/m/d') }}</td>
        <td>
          <a href="{{ route('admin.products.edit',$item->id) }}" class="btn btn-sm btn-outline-info">ویرایش</a>
          <form action="{{ route('admin.products.destroy',$item->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('حذف شود؟')" class="btn btn-sm btn-outline-danger">حذف</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $products->links() }}
</div>
@endsection