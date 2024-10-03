<x-dashboard-layout>
    <x-slot name="header">{{ $header }}</x-slot>
    <div>
        <div class="card p-3">
            <div class="w-100 d-flex justify-content-end mb-3">
                <div class="mt-3">
                    {{-- modal --}}
                    <x-modal id="modalCenter" modalButton="create" modalHeader="create product" save="save" withButton>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Enter Name"
                                    name="name" />
                                <span id="error-name" class="text-danger fs-small"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="emailWithTitle" class="form-label">price</label>
                                <input type="text" id="price" class="form-control curreny-form"
                                    placeholder="20000" name="price" type-currency="IDR" />
                                <span id="error-price" class="text-danger fs-small"></span>
                            </div>
                            <div class="col mb-3">
                                <label for="emailWithTitle" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="">Pilih Category</option>
                                </select>
                                <span id="error-category" class="text-danger fs-small"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                <span id="error-description" class="text-danger fs-small"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="">
                                <label for="" class="form-label mr-2">image product</label>

                                <input type="file" class="form-control d-none" name="image" id="image"
                                    multiple>
                                <button class="btn" type="button" id="plus"> <i
                                        class='bx bxs-plus-circle '></i></button>
                                <div><span id="error-image" class="text-danger fs-small"></span></div>
                            </div>
                        </div>
                        <div id="image-preview-container" class="row">
                            <img id="image-preview" src="" alt="">
                        </div>
                    </x-modal>
                    {{-- end modal --}}

                    {{-- modal image --}}
                    <x-modal id="modalImage" modalHeader="Product Image" save="saveImage">
                        <div class="image-container">
                            {{-- <div class="image-prev-wrapper">
                                <div class="overlay-image"></div>
                                <div class="close" id="closeModal"><i class='bx bx-x'></i></div>
                                <div class="container-preview">
                                    <img class="image-preview"
                                        src="{{ asset('storage/product-image/5a4eae2f-dc31-408f-be2f-badd15303cb6.jpg') }}"
                                        alt="">
                                </div>
                            </div> --}}
                        </div>
                    </x-modal>
                    {{-- end modal --}}

                </div>
            </div>
            <table class="table " id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {

                var table = $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('product.allData') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'categories.name',
                            name: 'categories.name',
                        },
                        {
                            data: function(d) {
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(d.price)
                            },
                            name: 'price'
                        },
                        {
                            data: function(data) {
                                return (
                                    `<div class="row link" id="showImage" data-id="${data.id}">
                                  Show Image
                                    </div>`
                                )
                            },
                            name: 'images'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ]
                });



                $.ajax({
                    type: "GET",
                    url: "{{ route('category.allData') }}",
                    success: function(categories) {
                        categories.map((c) => (
                            $('#category').append(`<option value="${c.id}">${c.name}</option>`)
                        ))
                    }
                })

                // handle untuk menampilkan text form error
                function formError(error) {
                    $('#error-name').text(error.name || "")
                    $('#error-price').text(error.price || "")
                    $('#error-category').text(error.category || "")
                    $('#error-description').text(error.description || "")
                    $('#error-image').text(error.image || "")
                }
                // initial value
                var imageFiles = [];
                let productId = null;

                // hanlde menghapus nilai value form
                function formValue(data) {
                    imageFiles = [];
                    $('#image-preview-container').empty()
                    $('#image').val(data === "" ? null : data.image)
                    $('#name').val(data.name || '')
                    $('#description').val(data.description || "")
                    $('#price').val(data.price || "")
                    $('#category').val(data.category_id || "")

                    if (data && data.images) {
                        data.images.forEach(image => {
                            const container = document.createElement('div');
                            container.className = 'row mb-3';


                            $(container).append(`   
                            <div class="image-prev-wrapper  mb-3">
                                <div class="close" id="deleteImage" ><i class='bx bx-x'></i></div>
                                <div class="container-preview">
                                    <img class="image-preview"
                                        src="{{ asset('storage/product-image/${image.image}') }}"
                                        alt="">
                                </div>
                            </div>`)

                            // imagePreview.push({})

                            $(container).on('click', '#deleteImage', function() {
                                deleteAlert(async function() {
                                    return new Promise((resolve, reject) => {
                                        $.ajax({
                                            type: "DELETE",
                                            url: "/products/" + image.id +
                                                "/product-image",
                                            success: function(response) {
                                                resolve({
                                                    status: true,
                                                    message: "Success"
                                                })
                                                container.remove();
                                            },
                                            error: function(xhr, status,
                                                error) {
                                                resolve({
                                                    status: false,
                                                    message: xhr
                                                        .responseJSON ||
                                                        error
                                                })
                                            }
                                        })
                                    })
                                })
                            })
                            $('#image-preview-container').append(container)

                            // imagePreview.push({})

                        });
                    }
                }

                $('#modalCenter').on('click', "#plus", function() {
                    $('#image').click()
                })

                $('#myTable').on('click', '#showImage', function() {
                    var id = $(this).data('id')
                    $('#modalImage').modal('show')
                    $.ajax({
                        type: "GET",
                        url: '/products/' + id + '/product-image',
                        success: function(res) {
                            res.map((img) => ($('#modalImage .image-container').append(`   
                            <div class="image-prev-wrapper img-${img.id} mb-3">
                                <div class="close" id="deleteImage" data-id="${img.id}"><i class='bx bx-x'></i></div>
                                <div class="container-preview">
                                    <img class="image-preview"
                                        src="{{ asset('storage/product-image/${img.image}') }}"
                                        alt="">
                                </div>
                            </div>`)))
                        }
                    })

                    $('#modalImage').on('click', '#deleteImage', function() {
                        var imageId = $(this).data('id')
                        deleteAlert(async function() {
                            return new Promise((resolve, reject) => {
                                $.ajax({
                                    type: "DELETE",
                                    url: '/products/' + imageId +
                                        '/product-image',
                                    success: function(res) {
                                        resolve({
                                            status: true,
                                            message: "Success"
                                        })
                                        $('#modalImage .img-' + imageId)
                                            .remove()
                                    },
                                    error: (xhr, status, error) => {
                                        resolve({
                                            status: false,
                                            message: xhr
                                                .responseJSON ||
                                                error
                                        })
                                    }
                                })
                            })
                        })
                    })

                })



                $('#image').change(function(e) {

                    const input = this;
                    if (input.files) {
                        Array.from(input.files).forEach((file, i) => {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                const container = document.createElement('div');
                                container.className = 'row mb-3';


                                $(container).append(`   
                            <div class="image-prev-wrapper  mb-3">
                                <div class="close" id="deleteImage" data-id="${i}"><i class='bx bx-x'></i></div>
                                <div class="container-preview">
                                    <img class="image-preview"
                                        src="${e.target.result}"
                                        alt="">
                                </div>
                            </div>`)

                                // imagePreview.push({})
                                imageFiles.push(file);

                                $(container).on('click', '#deleteImage', function() {
                                    container.remove(); // Hapus container
                                    imageFiles[i] = null;
                                })
                                $('#image-preview-container').append(container)

                            }

                            reader.readAsDataURL(file)
                        })
                    }
                    $('#image').val(null)
                })

                $('#modalCenter').on('hidden.bs.modal', function() {
                    formValue("")
                    formError("")
                    productId = null
                })
                $('#modalImage').on('hidden.bs.modal', function() {
                    $('#modalImage .image-container').empty()
                })


                function actionProduct(url, formData, id = null) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        processData: false, // Prevent jQuery from automatically transforming the data into a query string
                        contentType: false, // Prevent jQuery from setting content type header
                        success: function(response) {
                            $('#modalCenter').modal('hide');
                            formValue("")
                            table.ajax.reload()
                        },
                        error: function(xhr, status, error) {
                            if (xhr.responseJSON) {
                                formError(xhr.responseJSON)
                            }
                        }
                    })
                }


                // currency input
                $('.curreny-form').on('keyup', function() {
                    let value = $(this).val().replace(/[^,\d]/g, '')
                    if (value === "") {
                        $(this).val('')
                    } else {
                        let formatted = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0
                        }).format(parseInt(value))

                        $(this).val(formatted)
                    }
                })

                // edit
                $('#myTable').on('click', '#edit', function() {
                    productId = $(this).data('id')


                    $('#modalCenter h5').text('Edit product')
                    $('#modalCenter').modal('show')
                    $.ajax({
                        type: "GET",
                        url: "/product/" + productId + "/edit",
                        success: function(d) {
                            formValue(d)
                        }
                    })
                })

                $('#modalCenter form').on('submit', function(e) {
                    e.preventDefault()
                    formError('')
                    var price = 0;
                    if ($('#price').val().split('').includes('R')) {
                        price = parseInt($('#price').val().split('').splice(2).join('').split('.').join(''))
                    } else {
                        price = parseInt($('#price').val())
                    }
                    var formData = new FormData()

                    formData.append('name', $('#name').val())
                    formData.append('price', price)
                    formData.append('description', $('#description').val())
                    formData.append('category', $('#category').val())

                    // var imageFiles = $('#image')[0].files;

                    // Menambahkan setiap file ke FormData
                    Array.from(imageFiles).forEach((file) => {
                        formData.append('image[]', file);
                    });

                    if (productId !== null) {
                        actionProduct("/product/" + productId, formData, productId)
                    } else {
                        actionProduct("{{ route('product.store') }}", formData)
                    }

                })

                // Delete
                $('#myTable').on('click', '#hapus', function() {
                    var id = $(this).data('id')
                    deleteAlert(async function() {
                        return new Promise((resolve, reject) => {
                            $.ajax({
                                type: "DELETE",
                                url: "/product/" + id,
                                success: function(response) {
                                    resolve({
                                        status: true,
                                        message: "Success"
                                    })
                                    table.ajax.reload()
                                    productId = null
                                },
                                error: function(xhr, status, error) {
                                    resolve({
                                        status: false,
                                        message: error
                                    })
                                }
                            })
                        })


                    })

                })




                // Batas
            });
        </script>
    </x-slot>
</x-dashboard-layout>
