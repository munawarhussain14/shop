@extends('layouts.app')

@section('content')
    {{--    {{Auth::user()->first_name}}--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Products</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead class=" text-primary">
                            <th width="5%">
                                ID
                            </th>
                            <th width="20%">
                                Name
                            </th>
                            <th width="20%">
                                Image
                            </th>
                            <th width="10%">
                                Size
                            </th>
                            <th width="10%">
                                Quantity
                            </th>
                            <th width="20%">
                                Action
                            </th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("style")

@endsection

@section('script')
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('products.table') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'image_url', name: 'image_url'},
                    {data: 'size', name: 'size'},
                    {data: 'qty', name: 'qty'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
