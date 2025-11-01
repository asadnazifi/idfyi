@extends('admin.layout.main')

@section('content')
<section class="content-header">
    <h1>مدیریت سفارشات</h1>
</section>

<section class="content">

    <div class="box box-primary">
        <div class="box-header d-flex justify-content-between align-items-center">
            <form method="GET" class="form-inline">
                <input type="text" name="q" class="form-control" placeholder="جستجو شماره سفارش..." value="{{ request('q') }}">
                <select name="status" class="form-control ml-2">
                    <option value="all">همه وضعیت‌ها</option>
                    <option value="pending" @selected(request('status')=='pending')>در انتظار</option>
                    <option value="processing" @selected(request('status')=='processing')>در حال پردازش</option>
                    <option value="completed" @selected(request('status')=='completed')>تکمیل‌شده</option>
                    <option value="cancelled" @selected(request('status')=='cancelled')>لغوشده</option>
                </select>
                <button class="btn btn-primary" style="background-color:#4D6AFF;border:none;">فیلتر</button>
            </form>
        </div>

        <div class="box-body">
            <table class="table table-bordered">
                <thead >
                    <tr>
                        <th>#</th>
                        <th>شماره سفارش</th>
                        <th>کاربر</th>
                        <th>مبلغ کل</th>
                        <th>وضعیت</th>
                        <th>تاریخ</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr >
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ number_format($order->total_price) }} تومان</td>
                            <td>
                                @php
                                    $colors = [
                                        'pending'=>'warning', 'processing'=>'info',
                                        'completed'=>'success', 'cancelled'=>'danger'
                                    ];
                                @endphp
                                <span class="badge badge-{{ $colors[$order->status] ?? 'default' }}">
                                    {{ __("orders.status.$order->status") }}
                                </span>
                            </td>
                            <td>{{ jdate($order->created_at)->format('Y/m/d') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                    مشاهده
                                </a>
                                <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('حذف سفارش؟');">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">هیچ سفارشی ثبت نشده است.</td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
</section>
@endsection
