@extends('front.layout.main')
@push('style')
    <link rel="stylesheet" href="{{ asset('front/styles/components/profile.css') }}">
@endpush
@section('title', 'ورود')

@section('content')
    <div class="content">
        <div class="profile mt-20">
            <div class="navbar-dashbord">
                <ul>
                    <a href="#" class="BYekan ">
                        <li class="flex gap-10 activ-nav-profil"><iconify-icon class="font-24"
                                icon="mingcute:dashboard-fill"></iconify-icon> <span>داشبورد</span> </li>
                    </a>
                    <a href="#" class="BYekan ">
                        <li class="flex gap-10"><iconify-icon class="font-24" icon="iconamoon:profile-fill"></iconify-icon>
                            <span>پروفایل</span>
                        </li>
                    </a>
                    <a href="#" class="BYekan ">
                        <li class="flex gap-10"><iconify-icon class="font-24" icon="dashicons:products"></iconify-icon>
                            <span>سفارشات</span>
                        </li>
                    </a>
                    <a href="#" class="BYekan ">
                        <li class="flex gap-10"><iconify-icon class="font-24" icon="ion:notifcations"></iconify-icon>
                            <span>اعلان ها</span>
                        </li>
                    </a>
                    <a href="#" class="BYekan ">
                        <li class="flex gap-10"><iconify-icon class="font-24"
                                icon="fluent:person-support-32-filled"></iconify-icon> <span>پشتیبانی</span> </li>
                    </a>
                    <a href="#" class="BYekan ">
                        <li class="flex gap-10"><iconify-icon class="font-24" icon="material-symbols:login"></iconify-icon>
                            <span>خروج</span>
                        </li>
                    </a>
                </ul>
            </div>
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
