@props(['image', 'name', 'position'])

<div class=" flex flex-col items-center gap-8">
    <div class="relative group"><img src="{{ $image }}" alt="" class="rounded-full">
        <div
            class="absolute flex items-center gap-4 text-[20px]  justify-center absolute-center group-hover:opacity-100 opacity-0 transition-300 bg-black/70 w-full h-full rounded-full">
            <a href=""><i class="ri-facebook-fill text-white"></i></a>
            <a href=""><i class="ri-twitter-x-line text-white"></i></a>
            <a href=""><i class="ri-instagram-line text-white"></i></a>
        </div>
    </div>
    <div class="flex flex-col items-center">
        <h1 class="capitalize text-[24px]">{{ $name }}</h1>
        <span class="uppercase text-[12px] font-light text-center inline-block">{{ $position }}</span>
    </div>
</div>
