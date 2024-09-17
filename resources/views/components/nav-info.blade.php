<div class="bg-black text-white  py-2 flex justify-between items-center main__container">
    <div class="text-small flex items-center gap-8">
        <x-text-icon text="vannshop@gmail.com" gap="2">
            <x-slot name="icon">
                <i class="ri-mail-fill"></i>
            </x-slot>
        </x-text-icon>

        <x-text-icon text="087812418286" gap="2">
            <x-slot name="icon">
                <i class="ri-phone-fill"></i>
            </x-slot>
        </x-text-icon>
    </div>

    <div class="text-small flex items-center gap-6">
        @foreach (['login', 'account', 'my cart'] as $item)
            <h1 class="uppercase">{{ $item }}</h1>
        @endforeach

        <x-text-icon gap="2" text="items" reverse>
            <x-slot name="icon">
                <i class="ri-shopping-cart-2-line"></i>
            </x-slot>
        </x-text-icon>
    </div>
</div>
