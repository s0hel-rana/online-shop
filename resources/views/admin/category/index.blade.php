@extends('admin.master')
@section('content')
    @push('style')
        <!-- vendor css -->
        <link href="{{ asset('backend') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">

        <!-- Starlight CSS -->
        {{-- <link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css"> --}}
    @endpush
    @php
        $links = [
            'Home' => '',
            'Category list' => '',
        ];
    @endphp
    <x-breadcrumb title='Category' :links="$links" />

    <div class="card pd-5 pd-sm-10">
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-bordered table-hover">
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->
@endsection

@push('script')
    <script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/popper.js/popper.js"></script>
    {{-- <script src="{{ asset('backend') }}/lib/bootstrap/bootstrap.js"></script> --}}
    <script src="{{ asset('backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>

    {{-- <script src="{{ asset('backend') }}/js/starlight.js"></script> --}}
    <script type="text/javascript">
        $(function() {
            var table = $('#datatable').DataTable({
                stateSave: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: "{{ route('categories.index') }}",
                columns: [{
                        data: "DT_RowIndex",
                        title: "SL",
                        name: "DT_RowIndex",
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'name',
                        title: 'Name'
                    },
                    {
                        data: 'slug',
                        title: 'Slug'
                    },
                    {
                        data: 'created_at',
                        title: 'Created At'
                    },
                    {
                        data: 'action',
                        title: 'Action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
