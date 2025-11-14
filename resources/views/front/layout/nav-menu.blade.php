<div class="content">
    <div class="nav-menu space-between">
        <div id="nev-menu-phone">
            <ul>
                <li id="close-menu"><iconify-icon class="brand-color font-24" icon="mdi:remove-bold"></iconify-icon>
                </li>
                <li><a href="home.html"> <img width="26" src="assets/images/logo.png" alt=""> <span
                            class="brand-color">ایدیفای</span></a> </li>
                <li class="{{request()->routeIs('front.home')?'active-menu':''}}"><a href="{{route('front.home')}}"> <iconify-icon class="brand-color font-24"
                            icon="material-symbols:home-rounded"></iconify-icon> <span>خانه</span> </a></li>
                <li><a href="#"> <iconify-icon class="brand-color font-24" icon="gridicons:plans"></iconify-icon>
                        <span>پلن های پشتیبانی</span> </a></li>
                <li><a href="#"> <iconify-icon class="brand-color font-24"
                            icon="material-symbols:for-you"></iconify-icon> <span> درباره ما </span> </a>
                </li>
                <li class="{{request()->routeIs('front.contact')?'active-menu':''}}"><a href="{{route('front.contact')}}"> <iconify-icon class="brand-color font-24"
                            icon="icon-park-solid:phone-two"></iconify-icon> <span> تماس با ما </span> </a>
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li id="open-menu"> <iconify-icon class="brand-color font-24"
                        icon="game-icons:hamburger-menu"></iconify-icon></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#"> <span class="number-cart">1</span><iconify-icon class="brand-color font-24"
                            icon="mdi:cart"></iconify-icon> </a></li>
                @auth
                    <li><a href="{{route('front.dashbord')}}"> <iconify-icon class="brand-color font-24"
                                icon="arcticons:my-spectrum"></iconify-icon>
                            <span>  {{ Auth::user()->lastname }} {{ Auth::user()->farstname }}  </span> </a></li>
                @else
                    <li>
                    <a href="{{ route('front.login') }}" class="btn Peyda-B bg-bt ">
                        ورود / ثبت نام
                    </a>
                    </li>

                @endauth

            </ul>
        </div>
    </div>
</div>
