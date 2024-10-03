<x-guest-layout>
    <div class="main__container">
        <x-header>
            The Only Shop Page
        </x-header>
        <x-italic-text>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat,
            tellus
            vel tristique posuere diam,
        </x-italic-text>

        <div class="w-full justify-center flex flex-wrap gap-4 mt-[4rem] mb-[3rem]">
            <button class="relative group category-item" data-id="">
                <h1 id="category-id" class="font-semibold uppercase text-[14px]">All</h1>
                <span class="line w-full"></span>
            </button>
            @foreach ($categories as $item)
                <button class="relative group category-item" data-id="{{ $item->id }}">
                    <h1 id="category-id" class="font-semibold uppercase text-[14px]">{{ $item->name }}</h1>
                    <span class="line "></span>
                </button>
            @endforeach
        </div>

        <div class="flex justify-between items-center mb-4">
            <div><span class="text-[14px]" id="showing"></span> </div>
            <div>
                <select name="" id=""
                    class="p-2 rounded bg-gray_old text-[12px] border border-gray-400">
                    <option value="">Sort By</option>
                </select>
            </div>
        </div>

        <div id="empty-product">
        </div>
        <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8" id="product">
        </div>

        <div class="w-full flex justify-center mt-[4rem]">
            <button
                class="font-semibold uppercase transition-300 px-8 py-3 bg-blue_old text-white hover:bg-yellow hover:text-blue_old "><a
                    href="">View All
                    Shop
                    Items</a></button>

        </div>

        <div class="py-[4rem] lg:py-[12rem]">
            <x-header>
                Latest news about Fashion
            </x-header>
            <x-italic-text>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat,
                tellus
                vel tristique posuere diam,
            </x-italic-text>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                <div class="bg-white p-4 rounded">
                    <div class="flex items-center justify-between mb-4">
                        <div class="font-light text-blue_old"><span class="text-[33px] font-bold ">10</span>January
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="px-2 border-r border-blue_old text-[12px] font-light ">By: <span
                                    class="font-bold">Admin</span></div>
                            <div class=" text-[12px] font-light ">Comments: <span class="font-bold">32</span></div>
                        </div>
                    </div>

                    <div>
                        <a href="">
                            <h1 class="font-medium hover:text-yellow transition-300 mb-3">Donec commo is vulputate</h1>
                        </a>
                        <p class="text-[12px] text-text_gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Donec
                            faucibus maximus vehicula. tellus
                            vel tristique posuere, <span class="text-blue_old font-semibold ml-2">Read more</span></p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded">
                    <div class="flex items-center justify-between mb-4">
                        <div class="font-light text-blue_old"><span class="text-[33px] font-bold ">15</span>January
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="px-2 border-r border-blue_old text-[12px] font-light ">By: <span
                                    class="font-bold">Admin</span></div>
                            <div class=" text-[12px] font-light ">Comments: <span class="font-bold">32</span></div>
                        </div>
                    </div>

                    <div>
                        <a href="">
                            <h1 class="font-medium hover:text-yellow transition-300 mb-3">Donec commo is vulputate</h1>
                        </a>
                        <p class="text-[12px] text-text_gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Donec
                            faucibus maximus vehicula. tellus
                            vel tristique posuere, <span class="text-blue_old font-semibold ml-2">Read more</span></p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded">
                    <div class="flex items-center justify-between mb-4">
                        <div class="font-light text-blue_old"><span class="text-[33px] font-bold ">18</span>January
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="px-2 border-r border-blue_old text-[12px] font-light ">By: <span
                                    class="font-bold">Admin</span></div>
                            <div class=" text-[12px] font-light ">Comments: <span class="font-bold">32</span></div>
                        </div>
                    </div>

                    <div>
                        <a href="">
                            <h1 class="font-medium hover:text-yellow transition-300 mb-3">Donec commo is vulputate</h1>
                        </a>
                        <p class="text-[12px] text-text_gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Donec
                            faucibus maximus vehicula. tellus
                            vel tristique posuere, <span class="text-blue_old font-semibold ml-2">Read more</span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class=" bg-white main__container">
        <x-email-letter />
        <x-our-customer />
    </div>
    <div class="main__container">
        <x-brand />
    </div>

    @section('script')
        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,

                loop: true,
                draggable: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },

                },
            });

            $(document).ready(function() {
                function rupiah(n) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        maximumFractionDigits: 0,
                    }).format(n)
                }

                function showingCount(total, perPage) {
                    $('#showing').text(
                        `Showing ${total} of ${perPage} results`)
                }

                function getData() {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('product.all') }}",
                        success: function(response) {
                            showingCount(response.total, response.per_page)
                            response.data.forEach(function(data) {

                                $('#product').append(
                                    ` <div class="group ">
                                    <div class="w-full h-[400px] relative "><img src="{{ asset('storage/product-image/${data.images[0].image}') }}"  alt=""
                                    class="w-full h-full object-cover hover:cursor-pointer">
                                        <div class="transition bg-[rgba(255,255,255,0.5)] z-10  opacity-0 group-hover:opacity-100 absolute w-full h-full flex flex-col  left-0 bottom-0">
                                            <div  class=" w-full h-full grid place-content-center ">
                                                <a href="#" class="hover:bg-white w-[50px] h-[50px] rounded-full bg-blue_old grid place-content-center show"> <i class="ri-eye-line text-white  "></i></a>
                                            </div>
                                            
                                            <button class=" w-full h-[55px] hover:bg-white bg-blue_old hover:text-text_gray text-white text-[14px] "> <i class="ri-shopping-cart-2-line mr-3"></i> Add to Cart</button>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-5 bg-gray_old">
                                            <a href='#' class="inline font-medium capitalize mb-2">${data.name.split('').length > 25 ? data.name.split('').slice(0,25).join('')+ "..." : data.name}</a>
                                            <div class="flex justify-between items-center">
                                                <span class="text-blue_old font-medium text-[14px] block">${rupiah(data.price)}</span>
                                                <span class="text-[12px] text-text_gray group-hover:opacity-100 opacity-0 transition-300" >View Detail</span>    
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                )
                            })
                        }
                    });
                }
                getData()
                $('body').on('click', '.category-item', function(e) {
                    e.preventDefault();
                    $('.category-item').prop('disabled', false);
                    // Nonaktifkan hanya tombol yang diklik
                    $(this).prop('disabled', true);

                    let id = $(this).data('id');
                    $('#showing').empty();
                    $('#product').empty();
                    $('#empty-product').empty();
                    $.ajax({
                        type: 'GET',
                        url: id ? "/products/" + id : "{{ route('product.all') }}",
                        success: function(res) {

                            if (res.data.length < 1) {
                                $('#empty-product').append(
                                    `<div class="text-center w-full">
                                            <h1 class="text-[14px] text-center">No Product Yet</h1>
                                        </div>`
                                )
                            } else {
                                showingCount(res.total, res.per_page)
                                res.data.forEach(function(data) {
                                    $('#product').append(
                                        `  <div class="group ">
                                    <div class="w-full h-[400px] relative "><img src="{{ asset('storage/product-image/${data.images[0].image}') }}"  alt=""
                                    class="w-full h-full object-cover hover:cursor-pointer">
                                        <div class="transition bg-[rgba(255,255,255,0.5)] z-10  opacity-0 group-hover:opacity-100 absolute w-full h-full flex flex-col  left-0 bottom-0">
                                            <div  class=" w-full h-full grid place-content-center ">
                                                <a href="#" class="hover:bg-white w-[50px] h-[50px] rounded-full bg-blue_old grid place-content-center show"> <i class="ri-eye-line text-white  "></i></a>
                                            </div>
                                            
                                            <button class=" w-full h-[55px] hover:bg-white bg-blue_old hover:text-text_gray text-white text-[14px] "> <i class="ri-shopping-cart-2-line mr-3"></i> Add to Cart</button>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-5 bg-gray_old">
                                            <a href='#' class="inline font-medium capitalize mb-2">${data.name.split('').length > 25 ? data.name.split('').slice(0,25).join('')+ "..." : data.name}</a>
                                            <div class="flex justify-between items-center">
                                                <span class="text-blue_old font-medium text-[14px] block">${rupiah(data.price)}</span>
                                                <span class="text-[12px] text-text_gray group-hover:opacity-100 opacity-0 transition-300" >View Detail</span>    
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                    )
                                })
                            }


                        },
                        error: function() {
                            // Aktifkan kembali tombol jika terjadi error
                            $('.category-item').prop('disabled', false);
                        }
                    })
                })

                $('.category-item').on('click', function() {
                    $('.category-item .line').removeClass('w-full').addClass('w-0');
                    var lineElem = $(this).find('.line');
                    if (lineElem.hasClass('w-full')) {
                        lineElem.removeClass('w-full').addClass('w-0');
                    } else {
                        lineElem.removeClass('w-0').addClass('w-full');
                    }
                });

            });
        </script>
    @endsection
</x-guest-layout>
