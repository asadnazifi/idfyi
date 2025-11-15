@extends('front.layout.main')
@section('title', 'محصول')
@push('style')
    <link rel="stylesheet" href="{{ asset('front/styles/components/shop.css') }}">
@endpush
@section('content')
    <div class="content">
        <div class="content mt-20">
            <div class="header-shop flex gap-10">
                <div><img class="w-100" src="storage/{{ asset($plan->photo) }}" alt="{{ $plan->title }}"></div>
                <div>
                    <h2 class="Peyda-B">{{ $plan->title }}</h2>
                    <div class="Peyda-N text-color text-justify">
                        {!! $plan->short_content !!}
                    </div>

                </div>
                <div>
                    <div class="price-shop">
                        <div class="header-price flex BYekan">
                            <div><span><iconify-icon class="golde-color font-24" icon="solar:star-bold"><template
                                            shadowrootmode="open">
                                            <style data-style="data-style">
                                                :host {
                                                    display: inline-block;
                                                    vertical-align: 0
                                                }

                                                span,
                                                svg {
                                                    display: block
                                                }
                                            </style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M9.153 5.408C10.42 3.136 11.053 2 12 2s1.58 1.136 2.847 3.408l.328.588c.36.646.54.969.82 1.182s.63.292 1.33.45l.636.144c2.46.557 3.689.835 3.982 1.776c.292.94-.546 1.921-2.223 3.882l-.434.507c-.476.557-.715.836-.822 1.18c-.107.345-.071.717.001 1.46l.066.677c.253 2.617.38 3.925-.386 4.506s-1.918.051-4.22-1.009l-.597-.274c-.654-.302-.981-.452-1.328-.452s-.674.15-1.328.452l-.596.274c-2.303 1.06-3.455 1.59-4.22 1.01c-.767-.582-.64-1.89-.387-4.507l.066-.676c.072-.744.108-1.116 0-1.46c-.106-.345-.345-.624-.821-1.18l-.434-.508c-1.677-1.96-2.515-2.941-2.223-3.882S3.58 8.328 6.04 7.772l.636-.144c.699-.158 1.048-.237 1.329-.45s.46-.536.82-1.182z">
                                                </path>
                                            </svg>
                                        </template></iconify-icon></span><span>66</span></div>
                            <div><span>66</span><span><iconify-icon class="green font-24"
                                        icon="material-symbols:detector-status-rounded"><template shadowrootmode="open">
                                            <style data-style="data-style">
                                                :host {
                                                    display: inline-block;
                                                    vertical-align: 0
                                                }

                                                span,
                                                svg {
                                                    display: block
                                                }
                                            </style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m10.95 18.175l3.525-3.525q.3-.3.713-.312t.712.287t.3.713t-.3.712l-4.25 4.25q-.3.3-.7.3t-.7-.3L8.1 18.15q-.3-.3-.287-.7t.312-.7q.3-.275.7-.287t.7.287zM8.1 8l.3 1h7.2l.3-1zm.3 3q-.65 0-1.175-.387T6.5 9.6L6 8H5q-.825 0-1.412-.587T3 6V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v1q0 .825-.587 1.413T19 8h-1l-.65 1.7q-.225.575-.725.938T15.5 11z">
                                                </path>
                                            </svg>
                                        </template></iconify-icon></span></div>
                        </div>
                        <div class="content-price BYekan">
                            <div class="flex mt-20 gap-10 justfi-center">
                                <span><iconify-icon class="text-color font-24"
                                        icon="fluent:star-emphasis-24-filled"><template shadowrootmode="open">
                                            <style data-style="data-style">
                                                :host {
                                                    display: inline-block;
                                                    vertical-align: 0
                                                }

                                                span,
                                                svg {
                                                    display: block
                                                }
                                            </style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M13.211 3.102c-.495-1.003-1.926-1.003-2.421 0L8.432 7.88l-5.273.766c-1.107.16-1.55 1.522-.748 2.303l3.815 3.719l-.9 5.25c-.19 1.104.968 1.945 1.958 1.424L12 18.862l4.716 2.48c.99.52 2.148-.32 1.959-1.423l-.9-5.251l3.815-3.72c.8-.78.359-2.141-.749-2.302L15.57 7.88zm-12.047.679a.75.75 0 0 0 .118 1.054l2.5 2a.75.75 0 1 0 .937-1.171l-2.5-2a.75.75 0 0 0-1.055.117m21.672 14.437a.75.75 0 0 0-.117-1.054l-2.5-2a.75.75 0 0 0-.937 1.171l2.5 2a.75.75 0 0 0 1.054-.117M1.282 17.164a.75.75 0 1 0 .937 1.171l2.5-2a.75.75 0 0 0-.937-1.171zM22.836 3.78a.75.75 0 0 1-.117 1.054l-2.5 2a.75.75 0 0 1-.937-1.171l2.5-2a.75.75 0 0 1 1.054.117">
                                                </path>
                                            </svg>
                                        </template></iconify-icon></span>
                                <span class="text-color">بازگشت وجه درصورت حل نشدن مشکل</span>
                            </div>
                            <div class="price">
                                <h2 class="BYekan brand-color font-24">{{ $plan->price }} تومان</h2>
                                <div class="flex justfi-center">

                                    <button class="btn Peyda-N">ثبت سفارش </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="price-buttom">
                <div>
                    <button class="btn Peyda-N">ثبت سفارش </button>
                    <span class="BYekan brand-color font-24">{{$plan->price}} تومان</span>

                </div>
            </div>
            <div class="mt-20 Peyda-N text-color text-justify">
                {!! $plan->description !!}
            </div>
        </div>
    </div>
@endsection
