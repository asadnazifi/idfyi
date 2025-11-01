@extends('admin.layout.main')

@section('content')
<section class="content-header">
    <h1>جزئیات سفارش #{{ $order->order_number }}</h1>
</section>

<section class="content">
    <div class="box box-primary" style="background:#1E1E1E;color:#fff;">
        <div class="box-body">
            <h4>کاربر: {{ $order->user->name }} ({{ $order->user->email }})</h4>
            <p>مبلغ کل: {{ number_format($order->total_price) }} تومان</p>
            <p>وضعیت: <strong>{{ __("orders.status.$order->status") }}</strong></p>
            <p>تاریخ: {{ jdate($order->created_at)->format('Y/m/d H:i') }}</p>
            <p>آدرس: {{ $order->shipping_address ?? '—' }}</p>
            <p>توضیحات: {{ $order->notes ?? '—' }}</p>

            <hr>
            <h4>محصولات:</h4>
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>نام محصول</th>
                        <th>تعداد</th>
                        <th>قیمت واحد</th>
                        <th>مجموع</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ number_format($item->total) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
