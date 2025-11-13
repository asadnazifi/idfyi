<div class="navbar-dashbord">
    <ul>
        <a href="{{route('front.dashbord')}}" class="BYekan ">
            <li class="flex gap-10 {{ request()->routeIs('front.dashbord') ? 'activ-nav-profil' : '' }} "><iconify-icon
                    class="font-24" icon="mingcute:dashboard-fill"></iconify-icon> <span>داشبورد</span> </li>
        </a>
        <a href="{{route('front.profile')}}" class="BYekan ">
            <li class="flex gap-10 {{ request()->routeIs('front.profile') ? 'activ-nav-profil' : '' }}"><iconify-icon class="font-24  " icon="iconamoon:profile-fill"></iconify-icon>
                <span>پروفایل</span>
            </li>
        </a>
        <a href="{{route('front.orders')}}" class="BYekan ">
            <li class="flex gap-10 {{ request()->routeIs('front.orders')?'activ-nav-profil':'' }}"><iconify-icon class="font-24" icon="dashicons:products"></iconify-icon>
                <span>سفارشات</span>
            </li>
        </a>
        <a href="{{ route('front.notifications') }}" class="BYekan ">
            <li class="flex gap-10 {{ request()->routeIs('front.notifications')?'activ-nav-profil':'' }}"><iconify-icon class="font-24" icon="ion:notifcations"></iconify-icon>
                <span>اعلان ها</span>
            </li>
        </a>
        <a href="#" class="BYekan ">
            <li class="flex gap-10"><iconify-icon class="font-24" icon="fluent:person-support-32-filled"></iconify-icon>
                <span>پشتیبانی</span> </li>
        </a>
        <a href="{{ route('front.logout') }}" class="BYekan ">
            <li class="flex gap-10"><iconify-icon class="font-24" icon="material-symbols:login"></iconify-icon>
                <span>خروج</span>
            </li>
        </a>
    </ul>
</div>
