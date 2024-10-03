<div class="py-[4rem] full__container bg-white">

    <x-header>Few Facts About VannShop</x-header>
    <x-header-line />

    @php
        $fewFact = [
            [
                'count' => '457',
                'name' => 'sales',
            ],
            [
                'count' => '517',
                'name' => 'item',
            ],
            [
                'count' => '289',
                'name' => 'Client World Wide',
            ],
        ];
    @endphp

    <div class="mt-[4rem] grid grid-cols-3 text-blue_old">
        @foreach ($fewFact as $item)
            <div>
                <h4 class="text-[80px]  font-bold text-center">{{ $item['count'] }}</h4>
                <p class="text-center capitalize">{{ $item['name'] }}</p>
            </div>
        @endforeach
    </div>
</div>
