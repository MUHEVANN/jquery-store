@php
    $image = [
        asset('footer/1.jpg'),
        asset('footer/2.jpg'),
        asset('footer/3.jpg'),
        asset('footer/4.jpg'),
        asset('footer/5.jpg'),
        asset('footer/6.jpg'),
    ];
@endphp

<div class="bg-[#131313] ">
    <div class="main__container  -translate-y-[2rem] ">
        <div class="text-white grid-cols-2 grid md:grid-cols-6 shadow-2xl shadow-black relative">
            @for ($i = 0; $i < count($image); $i++)
                <div><img src="{{ $image[$i] }}" alt="" class="w-full h-full object-cover"></div>
            @endfor
            <div class="absolute absolute-center bg-black/30 p-3 text-[24px] font-semibold">From the @instagram</div>
        </div>
    </div>
    <div class="pt-[5rem] pb-[3rem] grid grid-col-1 gap-4 full__container">
        <div class="text-text_gray col-span-3">
            <x-logo position="text-start mb-6" />
            <x-footer-indentity>
                <x-slot name="icon">
                    <i class="ri-map-pin-line text-[20px] mr-3"></i>
                </x-slot>
                <p class="text-[14px]">Jl. Sendangrejo <br>
                    Sendangan, Karanganom</p>
            </x-footer-indentity>
            <x-footer-indentity>
                <x-slot name="icon">
                    <i class="ri-phone-line text-[20px] mr-3"></i>
                </x-slot>
                <p class="text-[14px]">087812418286</p>
            </x-footer-indentity>
            <x-footer-indentity>
                <x-slot name="icon">
                    <i class="ri-mail-send-line text-[20px] mr-3"></i>
                </x-slot>
                <p class="text-[14px]">muhammadevankusyanto@gmail.com</p>
            </x-footer-indentity>

        </div>

        <div class="col-span-4">
            <x-footer-header>Links</x-footer-header>
            <ul class="grid grid-cols-2 text-text_gray text-[14px]">
                <li class="list-footer">Product</li>
                <li class="list-footer">Feature</li>
                <li class="list-footer">Blog</li>
                <li class="list-footer">Product</li>
                <li class="list-footer">Feature</li>
                <li class="list-footer">Blog</li>
                <li class="list-footer">Find a Store</li>
                <li class="list-footer">Privacy Policy</li>
                <li class="list-footer">Press Kit</li>
                <li class="list-footer">Find a Store</li>
                <li class="list-footer">Privacy Policy</li>
                <li class="list-footer">Press Kit</li>
            </ul>
        </div>

        <div class="col-span-2">
            <x-footer-header>Account Info</x-footer-header>
            <ul class="text-[14px] text-text_gray">
                <li class="list-footer">Product</li>
                <li class="list-footer">Feature</li>
                <li class="list-footer">Blog</li>
                <li class="list-footer">Product</li>
                <li class="list-footer">Feature</li>
                <li class="list-footer">Blog</li>

            </ul>
        </div>
    </div>
    <div class="py-[2rem] border-t border-[rgba(255,255,255,0.05)] px-[24.5rem] flex justify-center full__container">
        <span class="text-white text-[12px]">&copy; <span id="year"></span> VannShop All right reserved.
            Evan</span>
    </div>
</div>
