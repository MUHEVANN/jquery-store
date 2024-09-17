@props(['text'])
<li>
    <a href="{{ $text }}"
        class="{{ url()->current() === config('app.url') . $text ? 'active-dashboard' : '' }}  py-1 hover:text-blue-400 dark:text-white hover:bg-blue_soft dark:hover:bg-blue_old hover:opacity-100 opacity-50 w-full flex gap-2 px-2 items-center  hover:cursor-pointer rounded transition-300">
        {{ $icon }}
        <h1 class="text-[12px] capitalize ">{{ $text }}</h1>
    </a>
</li>
