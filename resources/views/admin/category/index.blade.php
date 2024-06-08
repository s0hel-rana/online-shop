

{{-- <!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Yajra Datatables Tutorial - raviyatechnical</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('backend') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Laravel 9 Yajra Datatables Tutorial - raviyatechnical</h1>
        <table class="table table-bordered" id="data-table">
            show data
            <tbody>
            </tbody>
        </table>
    </div>
</body>
<script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>

    <script src="{{ asset('backend') }}/js/starlight.js"></script>
<script type="text/javascript">
    $(function() {
        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('categories.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    title: 'ID'
                },
                {
                    data: 'name',
                    name: 'name',
                    title: 'Name'
                },
                {
                    data: 'email',
                    name: 'email',
                    title: 'Email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>

</html> --}}


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
    <link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css">
@endpush
    
<div class="card pd-5 pd-sm-10">
    <div class="table-wrapper">
        <table id="datatable" class="table display responsive nowrap">
        </table>
    </div><!-- table-wrapper -->
</div><!-- card -->
@endsection

@push('script')
    
    <script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>

    <script src="{{ asset('backend') }}/js/starlight.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categories.index') }}",
                columns: [{
                        data: 'id',
                        title: 'SL'
                    },
                    {
                        data: 'name',
                        title: 'Name'
                    },
                    {
                        data: 'slug',
                        title: 'Slug'
                    },
                    // {
                    //     data: 'action',
                    //     title: 'Action',
                    //     orderable: false,
                    //     searchable: false
                    // },
                ]
            });
        });
    </script>
@endpush


