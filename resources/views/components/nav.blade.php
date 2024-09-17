<div class="bg-white main__container flex justify-between items-center">
    <x-logo />
    <div class="flex items-center gap-4 ">
        @foreach (['Home', 'About', 'contact'] as $item)
            <h1 class="uppercase text-[12px]">{{ $item }}</h1>
        @endforeach
    </div>
</div>
