<x-guest-layout>
    <x-header>
        The Only Shop Page
    </x-header>
    <x-italic-text>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat, tellus
        vel tristique posuere diam,
    </x-italic-text>

    <div>
        @foreach ($categories as $item)
            <h1 id="category-id" data-id="{{ $item->id }}">{{ $item->name }}</h1>
        @endforeach
    </div>

    <div id="product">
    </div>


    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
            </li>
        </ul>
    </div>

    @section('script')
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.index') }}",
                    success: function(response) {
                        response.forEach(function(data) {
                            $('#product').append(
                                `<h1>${data.name}</h1>`
                            )
                        })
                    }
                });

                $('body').on('click', '#category-id', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    console.log(id)
                    $('#product').empty();
                    $.ajax({
                        type: "GET",
                        url: "/product/" + id,
                        success: function(response) {
                            response.forEach(function(data) {
                                $('#product').append(
                                    `<h1>${data.name}</h1>`
                                )
                            })
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error);
                        }
                    });
                })
            });
        </script>
    @endsection
</x-guest-layout>
