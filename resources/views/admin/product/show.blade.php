@extends('admin.layouts.app')
@section('title')
Product
@endsection
@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
@php
$links = [
'Home'=>route('dashboard'),
'Product Details'=>''
]
@endphp
<x-breadcrumb title='Product' :links="$links" />



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">

                        <h3 class="card-title">Product Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Group : </th>
                                    <td>{{ $product->group ? $product->group->name : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Name : </th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile : </th>
                                    <td>{{ $product->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Address : </th>
                                    <td>{{ $product->address }}</td>
                                </tr>
                                <tr>
                                    <th>Email : </th>
                                    <td>{{ $product->email }}</td>
                                </tr>
                                <tr>
                                    <th>Status : </th>
                                    <td>{!! showStatus($product->status) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('script')

@endpush
