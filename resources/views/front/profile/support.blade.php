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

                    <form action="{{ route('front.support') }}" method="GET" class="search-bar BYekan">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="جستجو بر اساس عنوان یا شماره تیکت...">

                        <select name="status" class="BYekan">
                            <option value="default">تمام وضعیت‌ها</option>
                            <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>فعال</option>
                            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>در حال
                                بررسی</option>
                            <option value="answered" {{ request('status') == 'answered' ? 'selected' : '' }}>پاسخ داده شده
                            </option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>بسته شده</option>
                        </select>

                        <button type="submit" class="btn BYekan bg-bt">اعمال فیلتر</button>
                    </form>
                </div>

                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>شماره پشتیبانی</th>
                            <th>موضوع</th>
                            <th>پلن </th>
                            <th>وضعیت</th>
                            <th>اخرین ساعت پاسخ گوی</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($supports as $support)
                            <tr>
                                <td data-label="شماره سفارش">#{{ $support->id }}</td>
                                <td data-label="مبلغ">{{ $support->title }} </td>
                                <td data-label="پلن">{{ $support->plan->plan_name }} </td>
                                <td data-label="وضعیت">
                                    @php
                                        $statuses = [
                                            'open' => ['class' => 'status-pending', 'text' => 'فعال'],
                                            'in_progress' => ['class' => 'status-completed', 'text' => '  در حال برسی'],
                                            'closed' => ['class' => 'status-canceled', 'text' => 'بسته شده'],
                                            'answered' => ['class' => 'status-new', 'text' => 'پاسخ داده شده '],
                                        ];
                                        $status = $statuses[$support->status] ?? [
                                            'class' => 'status-pending',
                                            'text' => 'نامشخص',
                                        ];
                                    @endphp
                                    <span class="status {{ $status['class'] }}">{{ $status['text'] }}</span>
                                </td>
                                <td data-label="تاریخ خرید">{{ jdate($support->update_at)->format('d F Y - H:i') }}</td>

                                <td data-label="مشاهده">
                                    <a href="">
                                        <iconify-icon class="font-24" icon="mdi:show"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">تیکتی یافت نشد.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $supports->links('vendor.pagination.aidify') }}
                </div>
            </div>

        </div>
    </div>

@endsection
