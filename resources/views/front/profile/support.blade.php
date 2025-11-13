@extends('front.layout.main')
@push('style')
    <link rel="stylesheet" href="{{ asset('front/styles/components/profile.css') }}">
@endpush
@section('title', 'سفارشات')

@section('content')
    <div class="content">
        <div class="profile mt-20">
            @include('front.profile.nav-dashbord')
            <div class="content-profile BYekan">
                <div class="table-header">
                    <h2>لیست سفارشات</h2>

                    <form action="{{ route('front.orders') }}" method="GET" class="search-bar">
                        <input type="text" name="search" value="{{ request('search') }}" class="BYekan"
                            placeholder="جستجو...">
                        <select name="status" class="BYekan">
                            <option value="default">پیش‌فرض</option>
                            <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>سفارش جدید</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>در انتظار</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>تکمیل شد
                            </option>
                            <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>لغو شد</option>
                        </select>
                        <button type="submit" class="btn BYekan bg-bt">اعمال</button>
                    </form>
                </div>

                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>شماره سفارش</th>
                            <th>مبلغ</th>
                            <th>تاریخ خرید</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td data-label="شماره سفارش">#{{ $order->order_number }}</td>
                                <td data-label="مبلغ">{{ number_format($order->total_price) }} تومان</td>
                                <td data-label="تاریخ خرید">{{ jdate($order->created_at)->format('d F Y') }}</td>
                                <td data-label="وضعیت">
                                    @php
                                        $statuses = [
                                            'pending' => ['class' => 'status-pending', 'text' => 'در انتظار'],
                                            'completed' => ['class' => 'status-completed', 'text' => 'تکمیل شد'],
                                            'canceled' => ['class' => 'status-canceled', 'text' => 'لغو شد'],
                                            'processing' => ['class' => 'status-new', 'text' => 'سفارش جدید'],
                                        ];
                                        $status = $statuses[$order->status] ?? ['class' => 'status-pending', 'text' => 'نامشخص'];
                                    @endphp
                                    <span class="status {{ $status['class'] }}">{{ $status['text'] }}</span>
                                </td>
                                <td data-label="مشاهده">
                                    <a href="">
                                        <iconify-icon class="font-24" icon="mdi:show"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">سفارشی یافت نشد.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $orders->links('vendor.pagination.aidify') }}
                </div>
            </div>

        </div>
    </div>

@endsection
