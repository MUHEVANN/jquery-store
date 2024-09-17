<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>Home</title>
</head>

<body>

    <form method="POST">
        <input type="text" name="name" id="name" autocomplete="off">
        <input type="number" name="price" id="price">
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <button id="tes">tes</button>
    </form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(document).ready(function() {
            $(window).on('load', function() {
                $('input').attr('autocomplete', 'off')
            })
            $('#tes').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('product.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        name: $('#name').val(),
                        price: $('#price').val(),
                        description: $('#description').val()
                    },
                    success: function(data) {
                        console.log("first")
                    }
                })
            });
        });
    </script>
</body>

</html>
