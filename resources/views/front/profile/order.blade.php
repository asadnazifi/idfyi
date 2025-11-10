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
                    <div class="search-bar">
                        <input type="text" class='BYekan' placeholder="جستجو...">
                        <select class="BYekan">
                            <option>پیش فرض</option>
                            <option>سفارش جدید</option>
                            <option>در انتظار</option>
                        </select>
                    </div>
                </div>
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>اقدام</th>
                            <th>موقعیت</th>
                            <th>مجموع</th>
                            <th>تاریخ خرید</th>
                            <th>شماره سفارش</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="اقدام"><button class="action-btn">⋯</button></td>
                            <td data-label="موقعیت"><span class="status status-pending">در انتظار</span></td>
                            <td data-label="مجموع">$۳,۶۵۰</td>
                            <td data-label="تاریخ خرید">۲۱ فروردین ۱۴۰۴</td>
                            <td data-label="شماره سفارش">#۳۵۷۸۲۸۵۴</td>
                        </tr>
                        <tr>
                            <td data-label="اقدام"><button class="action-btn">⋯</button></td>
                            <td data-label="موقعیت"><span class="status status-new">سفارشات اخیر</span></td>
                            <td data-label="مجموع">$۳,۶۵۰</td>
                            <td data-label="تاریخ خرید">۲۱ فروردین ۱۴۰۴</td>
                            <td data-label="شماره سفارش">#۳۵۷۸۲۸۵۴</td>
                        </tr>
                        <tr>
                            <td data-label="اقدام"><button class="action-btn">⋯</button></td>
                            <td data-label="موقعیت"><span class="status status-completed">تکمیل شد</span></td>
                            <td data-label="مجموع">$۳,۶۵۰</td>
                            <td data-label="تاریخ خرید">۲۱ فروردین ۱۴۰۴</td>
                            <td data-label="شماره سفارش">#۳۵۷۸۲۸۵۴</td>
                        </tr>
                        <tr>
                            <td data-label="اقدام"><button class="action-btn">⋯</button></td>
                            <td data-label="موقعیت"><span class="status status-canceled">لغو شد</span></td>
                            <td data-label="مجموع">$۳,۶۵۰</td>
                            <td data-label="تاریخ خرید">۲۱ فروردین ۱۴۰۴</td>
                            <td data-label="شماره سفارش">#۳۵۷۸۲۸۵۴</td>
                        </tr>
                        <tr>
                            <td data-label="اقدام"><button class="action-btn">⋯</button></td>
                            <td data-label="موقعیت"><span class="status status-completed">تکمیل شد</span></td>
                            <td data-label="مجموع">$۳,۶۵۰</td>
                            <td data-label="تاریخ خرید">۲۱ فروردین ۱۴۰۴</td>
                            <td data-label="شماره سفارش">#۳۵۷۸۲۸۵۴</td>
                        </tr>
                    </tbody>
                </table>

                <div class="pagination">
                    <button>«</button>
                    <button class="active">۱</button>
                    <button>۲</button>
                    <button>۳</button>
                    <button>»</button>
                </div>


            </div>
        </div>
    </div>

@endsection
