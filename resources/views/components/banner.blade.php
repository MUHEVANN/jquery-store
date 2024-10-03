@props(['title', 'name_link'])

<div class="flex flex-col items-center py-[4rem] gap-4 banner">
    <h1 class="text-[34px]">{{ $title }}</h1>
    <div class="text-[12px] flex gap-4">
        <a href="{{ route('home.page') }}"><span class="capitalize">Home</span></a>
        <span class="text-text_gray">/</span>
        <span class="capitalize">{{ $name_link }}</span>
    </div>
</div>
