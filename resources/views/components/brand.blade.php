@props(['withHeader' => false, 'bg' => 'bg-cus_gray'])


<div class=" {{ $bg }}">
    @if ($withHeader)
        <div class="pt-[4rem]">
            <x-header>We work with the best brands</x-header>
            <x-header-line></x-header-line>
        </div>
    @endif


    <div class="py-[2.5rem]">
        <div class="swiper brandSwiper ">
            <div class="swiper-wrapper py-[2.5rem]">
                <div class="swiper-slide">
                    <img src="{{ asset('brand/1.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/2.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/3.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/4.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/1.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/2.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/3.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/4.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/1.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/2.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/3.png') }}" alt="" class="bg-transparent">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('brand/4.png') }}" alt="" class="bg-transparent">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</div>
