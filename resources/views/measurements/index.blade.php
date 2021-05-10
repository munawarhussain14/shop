@extends('layouts.app')

@section('content')
{{--    {{Auth::user()->first_name}}--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Measurements</h4>
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
                                Unit
                            </th>
                            <th width="25%">
                                Abbreviation
                            </th>
                            <th width="30%">
                                active
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
                ajax: "{{ route('measurements.table') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'unit', name: 'unit'},
                    {data: 'abbreviation', name: 'abbreviation'},
                    {data: 'active', name: 'active'},
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
