@extends('admin.layouts.app')
@section('title')
brand List
@endsection
@section('content')
<!-- Content Header (Page header) -->
    @php
    $links = [
    'Home'=>'',
    'Brand list'=>''
    ]
    @endphp
    <x-breadcrumb title='Brand' :links="$links"/>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <form @if(isset($brand)) action="{{route('brands.update', $brand->id)}}" @else action="{{route('brands.store')}}" @endif method="POST" class="" enctype="multipart/form-data">
                            @csrf
                            @if(isset($brand))
                            @method('PUT')
                            @endif
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Brand Entry</h3>
                                    <div class="card-tools">

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                                            <x-forms.text label="Name" inputName="name"
                                                placeholder="Enter Name" :isRequired='true' :isReadonly='false'
                                                :defaultValue="isset($brand) ? $brand->name : ''" />
                                        </div>
                                    </div>
                                    <button class="btn btn-info btn-sm waves-effect waves-float waves-light float-right ml-1"
                                        type="submit">Submit
                                    </button>
                                    <a href="{{ route('brands.index') }}"
                                   class="btn btn-warning btn-sm waves-effect waves-float waves-light float-right">Refresh</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">brand List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-hover">
                                    {{-- show from datatable--}}
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('js')
<!-- DataTables -->
<script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('#dataTable').dataTable({
            stateSave: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: '{{route('brands.index')}}',
            columns: [{
                    data: "DT_RowIndex",
                    title: "#",
                    name: "DT_RowIndex",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "name",
                    title: "Name",
                    searchable: true,
                    orderable: true
                },
                {
                    data: "slug",
                    title: "Slug",
                    searchable: true,
                    orderable: true
                },
                {
                    data: "action",
                    title: "Action",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    })

    function getEditAbleData(data){
        // console.log(data.type).val();
        data.name = $('input[name="name"]').val();
    }
    
</script>
@endpush