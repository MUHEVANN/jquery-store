<div class="pt-[6rem] pb-[10rem] bg-[#f7f7f7] full__container  ">
    <x-header>Our Team</x-header>
    <x-header-line></x-header-line>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 grid-cols-1 mt-[3rem] gap-14">

        @php
            $ourTeam = [
                [
                    'name' => 'Mark Adnan',
                    'position' => 'ceo &founder',
                    'image' => asset('our-team/1.jpg'),
                ],
                [
                    'name' => 'Jennifer Rod',
                    'position' => 'DESIGNER',
                    'image' => asset('our-team/2.jpg'),
                ],
                [
                    'name' => 'natasha singh',
                    'position' => 'DEVELOPER',
                    'image' => asset('our-team/3.jpg'),
                ],
                [
                    'name' => 'Jhon mark',
                    'position' => 'Product Designer',
                    'image' => asset('our-team/4.jpg'),
                ],
                [
                    'name' => 'Evan k',
                    'position' => 'Quality Head',
                    'image' => asset('our-team/5.jpg'),
                ],
                [
                    'name' => 'Chan Gro',
                    'position' => 'DEVELOPER',
                    'image' => asset('our-team/6.jpg'),
                ],
            ];
        @endphp
        @foreach ($ourTeam as $item)
            <x-about-our-team-card image="{{ $item['image'] }}" name="{{ $item['name'] }}"
                position="{{ $item['position'] }}" />
        @endforeach



    </div>
</div>
