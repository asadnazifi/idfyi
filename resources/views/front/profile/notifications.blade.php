@extends('front.layout.main')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/styles/components/profile.css') }}">
@endpush

@section('title', 'اعلان‌ها')

@section('content')
    <div class="content">
        <div class="profile mt-20">
            @include('front.profile.nav-dashbord')

            <div class="content-profile BYekan">
                <div class="table-header">
                    <h2>لیست اعلان‌ها</h2>

                    <form action="{{ route('front.notifications') }}" method="GET" class="search-bar">
                        <input type="text" name="search" value="{{ request('search') }}" class="BYekan"
                            placeholder="جستجو در عنوان یا متن...">
                        <select name="status" class="BYekan">
                            <option value="">همه</option>
                            <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>خوانده‌نشده</option>
                            <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>خوانده‌شده</option>
                        </select>
                        <button type="submit" class="btn BYekan bg-bt">اعمال</button>
                    </form>
                </div>

                <form action="{{ route('front.notifications.toggle') }}" method="POST" id="notificationsForm">
                    @csrf
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAll"></th>
                                <th>عنوان</th>
                                <th>متن اعلان</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($notifications as $notification)
                                @php
                                    $isRead = $notification->pivot->is_read;
                                @endphp
                                <tr class="{{ $isRead ? 'notification-read' : 'notification-unread' }}">
                                    <td>
                                        <input type="checkbox" name="ids[]" value="{{ $notification->id }}">
                                    </td>
                                    <td><a class="link" href="{{ $notification->link }}">{{ $notification->title }}</a></td>
                                    <td>{{ Str::limit($notification->message, 80) }}</td>
                                    <td>{{ jdate($notification->created_at)->format('d F Y') }}</td>
                                    <td>
                                        <span class="status {{ $isRead ? 'status-completed' : 'status-pending' }}">
                                            {{ $isRead ? 'خوانده‌شده' : 'خوانده‌نشده' }}
                                        </span>
                                    </td>
                                    <td class="text-center BYekan">
                                        @if($isRead)
                                            <button type="button" class="btn BYekan toggle-read bg-bt"
                                                data-id="{{ $notification->id }}" data-status="unread" title="علامت به خوانده‌نشده">
                                                <i class="fas fa-eye-slash fa-lg"></i>خوانده نشده
                                            </button>
                                        @else
                                            <button type="button" class="btn toggle-read bg-bt BYekan"
                                                data-id="{{ $notification->id }}" data-status="read" title="علامت به خوانده‌شده">
                                                مشاهده
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">اعلانی یافت نشد.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="actions-group mt-10">
                        <button type="submit" name="action" value="read" class="btn bg-green BYekan">علامت‌گذاری
                            خوانده‌شده</button>
                        <button type="submit" name="action" value="unread" class="btn bg-red BYekan">علامت‌گذاری
                            خوانده‌نشده</button>
                    </div>
                </form>

                <div class="pagination">
                    {{ $notifications->links('vendor.pagination.aidify') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // انتخاب همه چک‌باکس‌ها
        $('#checkAll').on('change', function () {
            $('input[name="ids[]"]').prop('checked', $(this).prop('checked'));
        });

        // تغییر وضعیت خوانده شدن با ajax
        $(document).on('click', '.toggle-read', function () {
            const id = $(this).data('id');
            const status = $(this).data('status');

            $.post("{{ route('front.notifications.toggle') }}", {
                _token: "{{ csrf_token() }}",
                id: id,
                status: status
            })
                .done(function () {
                    // می‌تونی به جای reload تغییر آیکن بدی برای UX بهتر
                    // مثال:
                    const icon = $(this).find('i');
                    location.reload();
                })
                .fail(function () {
                    alert('خطا در ارتباط با سرور.');
                });
        });
    </script>
@endpush
