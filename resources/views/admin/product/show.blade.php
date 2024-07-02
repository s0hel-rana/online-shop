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
                                    <th>Name : </th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description : </th>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <th>Price : </th>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <th>Compare Price : </th>
                                    <td>{{ $product->compare_price }}</td>
                                </tr>
                                <tr>
                                    <th>Category : </th>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Sub Category : </th>
                                    <td>{{ $product->subCategory->name }}</td>
                                </tr>
                                <tr>
                                    <th>Brand : </th>
                                    <td>{{ $product->brand->name }}</td>
                                </tr>
                                <tr>
                                    <th>Featured : </th>
                                    <td>{{ $product->is_featured }}</td>
                                </tr>
                                <tr>
                                    <th>SKU : </th>
                                    <td>{{ $product->sku }}</td>
                                </tr>
                                <tr>
                                    <th>Barcode : </th>
                                    <td>{{ $product->barcode }}</td>
                                </tr>
                                <tr>
                                    <th>Track QTY : </th>
                                    <td>{{ $product->track_qty }}</td>
                                </tr>
                                <tr>
                                    <th>QTY : </th>
                                    <td>{{ $product->qty }}</td>
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
