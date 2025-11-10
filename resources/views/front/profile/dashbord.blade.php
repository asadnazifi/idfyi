@extends('front.layout.main')
@push('style')
    <link rel="stylesheet" href="{{ asset('front/styles/components/profile.css') }}">
@endpush
@section('title', 'داشبورد')

@section('content')
    <div class="content">
        <div class="profile mt-20">
                @include('front.profile.nav-dashbord')
            <div class="content-profile BYekan">
                <h2>داشبورد</h2>
                <div class="content-right-panel flex gap-10">
                    <div>
                        <p><iconify-icon class="font-24" icon="tdesign:user-setting-filled"></iconify-icon></p>
                        <div class="mt-20 mb-20 flex justfi-betwen">
                            <span>پروفایل</span>
                            <span><iconify-icon class="font-24" icon="mingcute:left-fill"></iconify-icon></span>
                        </div>
                    </div>
                    <div>
                        <p><iconify-icon class="font-24" icon="tdesign:user-setting-filled"></iconify-icon></p>
                        <div class="mt-20 mb-20 flex justfi-betwen">
                            <span>پشتیبانی</span>
                            <span><iconify-icon class="font-24" icon="mingcute:left-fill"></iconify-icon></span>
                        </div>
                    </div>
                    <div>
                        <p><iconify-icon class="font-24" icon="tdesign:user-setting-filled"></iconify-icon></p>
                        <div class="mt-20 mb-20 flex justfi-betwen">
                            <span>پشتیبانی</span>
                            <span><iconify-icon class="font-24" icon="mingcute:left-fill"></iconify-icon></span>
                        </div>
                    </div>
                    <div>
                        <p><iconify-icon class="font-24" icon="tdesign:user-setting-filled"></iconify-icon></p>
                        <div class="mt-20 mb-20 flex justfi-betwen">
                            <span>پشتیبانی</span>
                            <span><iconify-icon class="font-24" icon="mingcute:left-fill"></iconify-icon></span>
                        </div>
                    </div>
                    <div>
                        <p><iconify-icon class="font-24" icon="tdesign:user-setting-filled"></iconify-icon></p>
                        <div class="mt-20 mb-20 flex justfi-betwen">
                            <span>پشتیبانی</span>
                            <span><iconify-icon class="font-24" icon="mingcute:left-fill"></iconify-icon></span>
                        </div>
                    </div>
                    <div>
                        <p><iconify-icon class="font-24" icon="tdesign:user-setting-filled"></iconify-icon></p>
                        <div class="mt-20 mb-20 flex justfi-betwen">
                            <span>پشتیبانی</span>
                            <span><iconify-icon class="font-24" icon="mingcute:left-fill"></iconify-icon></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
