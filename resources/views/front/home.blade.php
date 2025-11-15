@extends('front.layout.main')
@section('title', 'خانه')

@section('content')
    <div class="content">
        <section class="section-introduction">
            <div class="Introduction">
                <div>
                    <div class="Peyda-B">
                        <h1>با تیم پشتیبانی <span class="brand-color-darck">آیدیفای</span></h1>
                    </div>
                    <p class="Peyda-B text-center">یک قرن در خدمت شماییم</p>
                    <p class="Peyda-B text-justify text-color">
                        ما در آیدیفای با افتخار به عنوان همراهی مطمئن برای مدیران وب‌سایت‌ها فعالیت می‌کنیم. از
                        رفع مشکلات ناگهانی تا بهینه‌سازی عملکرد سایت، تیم پشتیبانی ما به صورت ۲۴ ساعته و ۷ روز
                        هفته آماده پاسخگویی و ارائه راهکارهای فوری است.<br> با تجربه گسترده در مدیریت وردپرس،
                        رفع خطاها، بهبود سرعت، امنیت سایت و حل مشکلات فنی، ما تضمین می‌کنیم هیچ وب‌سایتی بدون
                        پشتیبان نماند.
                    </p>
                    <div class="mt-20">
                        <button class="btn float-left  Peyda-B bg-bt mb-20"><a class="color-white" href="#">درخواست
                                پشتیبانی</a></button>
                    </div>

                </div>
                <div class="text-center">
                    <img src="{{ asset('front/assets/images/nazifi.png') }}" alt="">
                </div>
            </div>
        </section>
        <div class="card_introduction flex mt-20">
            <div>
                <div class="font-104"><iconify-icon class="brand-color-darck " icon="mdi:infinity"></iconify-icon></div>
                <div class="w-100">
                    <p class="Peyda-N text-center font-32 mt-10">همیشگی</p>
                    <p class="Peyda-N text-center text-color font-20 mt-10">همیشه اینجایم</p>
                </div>
            </div>
            <div>
                <div class="font-104"><iconify-icon class="green " icon="material-symbols:lock"></iconify-icon></div>
                <div class="w-100">
                    <p class="Peyda-N text-center font-32 mt-10">مطمئن</p>
                    <p class="Peyda-N text-center text-color font-20 mt-10">پشتیانی مطمئن</p>
                </div>
            </div>
            <div>
                <div class="font-104"><iconify-icon class="origin " icon="ic:outline-loop"></iconify-icon></div>
                <div class="w-100">
                    <p class="Peyda-N text-center font-32 mt-10">بی وقفه</p>
                    <p class="Peyda-N text-center text-color font-20 mt-10">راحل همیشه </p>
                </div>
            </div>
            <div>
                <div class="font-104"><iconify-icon class="goold " icon="mynaui:lightning"></iconify-icon></div>
                <div class="w-100">
                    <p class="Peyda-N text-center font-32 mt-10">آماده</p>
                    <p class="Peyda-N text-center text-color font-20 mt-10">سریع و آماده</p>
                </div>
            </div>

        </div>
        <div class="title_subject">
            <div>
                <p class="Peyda-B brand-color-darck font-32">پلن ها</p>
            </div>
            <div>
                <button class="btn Peyda-B bg-bt mb-20"><a class="color-white" href="#">مشاهده همه
                    </a></button>
            </div>
        </div>
        <div class="cart-itme">
            @foreach ($plans as $plan)
                <div><a href="{{ route('front.product', $plan->slug) }}">
                        <div><img src="storage/{{ asset($plan->photo) }}" alt="{{ $plan->title }}" class="w-100"></div>
                        <div>
                            <p class="Peyda-B font-32">{{ $plan->title }}</p>
                        </div>
                        <div class="Peyda-N text-color text-justify">
                            {!! $plan->short_content !!}
                        </div>
                        <div class="Peyda-B brand-color font-24 text-justify mt-20 float-left">
                            {{ $plan->price }} تومان
                        </div>
                    </a>

                    <div class="text-center btn-cart"> <button class="btn Peyda-B bg-bt "><a class="color-white"
                                href="#">درخواست
                            </a></button></div>
                </div>
            @endforeach



        </div>
        <div class="title_subject">
            <div>
                <p class="Peyda-B brand-color-darck font-32">تیم ما</p>
            </div>
            <div>
                <button class="btn Peyda-B bg-bt mb-20"><a class="color-white" href="#">مشاهده همه
                    </a></button>
            </div>
        </div>
        <div class="cart-itme">
            <div>
                <div><img src="{{ asset('front/assets/images/asad.png') }}" alt="" class="w-100"></div>
                <div>
                    <p class="Peyda-B font-32 text-center mt-20">اسعد نظیفی </p>
                </div>
                <div>
                    <p class="Peyda-B text-color text-center mt-20 mb-10">مدیر و موسس سایت</p>
                </div>
            </div>
            <div>
                <div><img src="{{ asset('front/assets/images/afshin.png') }}" alt="" class="w-100"></div>
                <div>
                    <p class="Peyda-B font-32 text-center mt-20"> افشین مرادی </p>
                </div>
                <div>
                    <p class="Peyda-B text-color text-center mt-20 mb-10">مدیر عامل UX سایت</p>
                </div>

            </div>
            <div>
                <div><img src="{{ asset('front/assets/images/mahsa.png') }}" alt="" class="w-100"></div>
                <div>
                    <p class="Peyda-B font-32 text-center mt-20"> ممهسا نوری </p>
                </div>
                <div>
                    <p class="Peyda-B text-color text-center mt-20 mb-10">مدیر و توسعه دهنده فرانت سایت</p>
                </div>
            </div>


        </div>
        <div class="title_subject">
            <div>
                <p class="Peyda-B brand-color-darck font-32">آخرین اخبار </p>
            </div>
            <div>
                <button class="btn Peyda-B bg-bt mb-20"><a class="color-white" href="#">مشاهده همه
                    </a></button>
            </div>
        </div>
        <div class="cart-itme">
            @foreach ($ArticlesLists as $artilec)
                <div>
                    <div><img src="{{ $artilec->thumbnail }}" alt="{{ $artilec->title }}" class="w-100"></div>
                    <div>
                        <p class="Peyda-B font-32 text-center"> {{ Str::limit($artilec->title, 25) }}</p>
                    </div>
                    <div>
                        <p class="Peyda-N text-color text-justify"> {!! Str::limit($artilec->short_content, 300) !!}</p>
                    </div>
                    <div class="text-center btn-cart"> <button class="btn Peyda-B bg-bt "><a class="color-white" href="#">مشاهده
                            </a></button></div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
