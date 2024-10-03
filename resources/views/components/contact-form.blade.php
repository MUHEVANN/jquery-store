@php
    $form = [
        [
            'label' => 'Full name *',
            'type' => 'text',
            'id' => 'full_name',
        ],
        [
            'label' => 'Email *',
            'type' => 'email',
            'id' => 'email',
        ],
        [
            'label' => 'Phone *',
            'type' => 'text',
            'id' => 'phone',
        ],
        [
            'label' => 'Subject *',
            'type' => 'text',
            'id' => 'subject',
        ],
    ];

@endphp


<div class="bg-white full__container py-[6rem]">
    <h1>Keep in Touch With Us</h1>
    <div class="mt-4 grid grid-cols-3 gap-8">
        <form action="" class="col-span-2 grid grid-cols-2 gap-4">
            @foreach ($form as $item)
                <div>
                    <label for="" class="uppercase text-[12px] text-blue-old ">{{ $item['label'] }}</label>
                    <input id="{{ $item['id'] }}" type="{{ $item['type'] }}"
                        class="outline-none focus:ring-0 w-full mt-1">
                </div>
            @endforeach
            <div class="col-span-2 w-full">
                <label for="" class="uppercase text-[12px] text-blue-old ">Message *</label>
                <textarea name="message" id="message" cols="30" rows="10" class="w-full mt-1"></textarea>

            </div>

            <div>
                <button type="submit"
                    class="bg-blue_old px-8 py-[10px] text-white font-semibold uppercase text-[14px] hover:bg-yellow hover:text-blue_old transition-300">Send
                    Mail</button>
            </div>
        </form>
        <div class="">
            <div class="px-8 py-12 border-2 border-yellow">
                <h1 class="text-[12px] uppercase mb-5">OUR ADDRES</h1>
                <x-footer-indentity>
                    <x-slot name="icon">
                        <i class="ri-map-pin-line font-light  mr-3"></i>
                    </x-slot>
                    <p class="text-[12px] font-light">Jl. Sendangrejo <br>
                        Sendangan, Karanganom</p>
                </x-footer-indentity>
                <x-footer-indentity>
                    <x-slot name="icon">
                        <i class="ri-phone-line font-light  mr-3"></i>
                    </x-slot>
                    <p class="text-[12px] font-light">087812418286</p>
                </x-footer-indentity>
                <x-footer-indentity>
                    <x-slot name="icon">
                        <i class="ri-mail-send-line font-light  mr-3"></i>
                    </x-slot>
                    <p class="text-[12px] font-light">muhammadevankusyanto@gmail.com</p>
                </x-footer-indentity>
                <p class="ml-7 text-text_brown_gray text-[12px]">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Nullam erat turpis,
                    pellentesque non leo eget.</p>
            </div>
        </div>
    </div>
</div>
