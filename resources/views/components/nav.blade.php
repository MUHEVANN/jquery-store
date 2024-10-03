<div class="bg-white main__container flex justify-between items-center py-6 shadow-sm z-[9999] sticky top-0 transition-300"
    id="navbar">
    <x-logo />
    <div class="md:flex-row md:items-center gap-4 md:relative absolute left-0 top-[65px] transition-300 md:top-0 bg-white md:w-[auto] md:px-0 px-4 md:h-full  md:py-0 h-0 overflow-hidden w-full flex flex-col"
        id="menu">
        @foreach (['home', 'about', 'contact', 'products'] as $item)
            <a href="{{ route($item . '.page') }}" class="relative group w-full">

                <div
                    class="uppercase w-full md:py-2 text-[13px] text-blue_old font-semibold md:text-black md:font-normal md:text-[14px] hover:cursor-pointer">
                    {{ $item }}</div>
                <span
                    class=" line {{ Request::is('/') ? ($item === 'home' ? 'w-[30px]' : 'w-0') : (Request::is($item . '-page') ? 'w-[30px]' : 'w-0') }}"></span>
            </a>
        @endforeach
    </div>
    <div class="flex md:hidden hover:cursor-pointer" id="toggle">
        <i class="ri-menu-line"></i>
    </div>
</div>
