<x-dashboard-layout>
    <div>
        <div class="card p-2">
            <table class="table " id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            })
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
                    ]
                });
            });
        </script>
    </x-slot>
</x-dashboard-layout>
