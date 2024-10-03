<x-dashboard-layout>
    <x-slot name="header">{{ $header }}</x-slot>
    <div>

        <div class="card p-3">
            <div class="w-full d-flex justify-content-end mb-3">
                <x-modal id="modalEdit" modalButton="create" modalHeader="create category" save="save" withButton>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter Name"
                                name="name" />
                            <span id="error-name" class="text-danger fs-small"></span>
                        </div>
                    </div>
                </x-modal>
            </div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                var table = $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('category.datatable') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },

                    ]
                })
                var category = null;

                function formReq(value) {
                    $('#name').val(value || "")
                }

                $('#myTable').on('click', '#edit', function() {
                    category = $(this).data('id')
                    $('#modalEdit').modal('show')
                    $.ajax({
                        type: "GET",
                        url: "category/" + category + "/edit",
                        success: function(data) {
                            formReq(data.name)
                        }
                    })
                })

                $('#modalEdit form').on('submit', function(e) {
                    e.preventDefault()
                    if (category !== null) {
                        $.ajax({
                            type: "PUT",
                            url: "category/" + category,
                            data: {
                                name: $('#name').val()
                            },
                            success: function(data) {
                                $('#modalEdit').modal('hide')
                                formReq('')
                                table.ajax.reload()
                            }
                        })
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "category",
                            data: {
                                name: $('#name').val()
                            },
                            success: function(data) {
                                $('#modalEdit').modal('hide')
                                formReq('')
                                table.ajax.reload()
                            }
                        })
                    }
                })

                $('#modalEdit').on('hidden.bs.modal', function() {
                    formReq('')
                    category = null
                })

                $('#myTable').on('click', '#hapus', function() {
                    category = $(this).data('id')
                    deleteAlert(async function() {
                        return new Promise((resolve, reject) => {
                            $.ajax({
                                type: "DELETE",
                                url: "category/" + category,
                                success: function(data) {
                                    table.ajax.reload()
                                    category = null
                                    resolve({
                                        message: "Delete category success",
                                        status: true
                                    })
                                }
                            })
                        })
                    }, 'semua product yang bersangkutan juga akan terhapus!')
                })
            });
        </script>
    </x-slot>
</x-dashboard-layout>
