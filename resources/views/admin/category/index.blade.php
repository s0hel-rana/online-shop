@extends('admin.layouts.app')
@section('title')
Category List
@endsection
@section('content')
@php
$links = [
'Home'=>'',
'Category list'=>''
]
@endphp
<x-breadcrumb title='Category' :links="$links" />

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <form @if(isset($category)) action="{{route('categories.update', $category->id)}}" @else action="{{route('categories.store')}}" @endif method="POST" class="" enctype="multipart/form-data">
                            @csrf
                            @if(isset($category))
                            @method('PUT')
                            @endif
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Category Entry</h3>
                                    <div class="card-tools">

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                                            <x-forms.text label="Name" inputName="name"
                                                placeholder="Enter Name" :isRequired='true'
                                                :isReadonly='false' :defaultValue="isset($category) ? $category->name : ''" />
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="serial_no">Image</label>
                                                <input type="file" name="image" id="image">
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-info btn-xs waves-effect waves-float waves-light float-right ml-1"
                                        type="submit">Submit
                                    </button>
                                    <a href="{{ route('categories.index') }}"
                                   class="btn btn-warning btn-xs waves-effect waves-float waves-light float-right">Refresh</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Category List</h3>
                                <div class="card-tools">
                                    <a href="{{route('categories.create')}}">
                                        <button class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"
                                                aria-hidden="true"></i> &nbsp;Add Category
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover">
                                    {{-- show from datatable--}}
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.card -->

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
@push('style')

@endpush
@section('js')
<!-- DataTables -->
<script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection
@push('script')
<!-- page script -->
<script>
    $(document).ready(function () {
            $('#dataTable').dataTable({
                stateSave: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('categories.index') }}",
                },
                columns: [{
                    data: "DT_RowIndex",
                    title: "SL",
                    name: "DT_RowIndex",
                    searchable: false,
                    orderable: false
                },
                    {
                        data: "name",
                        title: "Name",
                        searchable: true
                    },
                    {
                        data: "slug",
                        title: "Slug",
                        searchable: true
                    },
                    {
                        data: "created_at",
                        title: "Created at",
                        searchable: true
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
</script>
@endpush