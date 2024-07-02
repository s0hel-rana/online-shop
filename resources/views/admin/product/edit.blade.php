@extends('admin.layouts.app')
@section('title')
Category Edit
@endsection
@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
@php
$links = [
'Home'=>'',
'Product Edit'=>''
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

                        <h3 class="card-title">Product Edit</h3>
                        <div class="card-tools">
                            <a href="{{route('products.index')}}"><button class="btn btn-sm btn-primary"><i class="fa fa-list" aria-hidden="true"></i> &nbsp;See List</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('products.update',$product->id)}}" class="form form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.text label="Name" inputName="name" placeholder="Enter Name" :isRequired='true' :isReadonly='false' :defaultValue="$product->name" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="5" rows="1">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.text label="Price" inputName="price" placeholder="Enter Price" :isRequired='true' :isReadonly='false' :defaultValue="$product->price" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.text label="Compare Price" inputName="compare_price" placeholder="Enter Compare Price" :isRequired='true' :isReadonly='false' :defaultValue="$product->compare_price" />
                                </div>
                                {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <input type="file">
                                </div> --}}
                                <div class="col-xl-4 col-md-4 col-12 mb-1">
                                  <x-forms.select label="Category" inputName="category_id" placeholder="Select One" :isRequired='true'  :isReadonly='false' :defaultValue="$product->category_id" :options="$categories" optionId="id" optionValue="name"/>
                                </div>
                                <div class="col-xl-4 col-md-4 col-12 mb-1">
                                    <x-forms.select label="Sub Category" inputName="sub_category_id" placeholder="Select One" :isRequired='true'  :isReadonly='false' :defaultValue="$product->sub_category_id" :options="$subCategories" optionId="id" optionValue="name"/>
                                </div>
                                <div class="col-xl-4 col-md-4 col-12 mb-1">
                                    <x-forms.select label="Brand" inputName="brand_id" placeholder="Select One" :isRequired='true'  :isReadonly='false' :defaultValue="$product->brand_id" :options="$brands" optionId="id" optionValue="name"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.static-select label="Featured" inputName="is_featured" placeholder="Select One" :isRequired='true'  :isReadonly='false' :defaultValue="$product ? $product->is_featured : ''" :options="['yes','no']"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.text label="SKU" inputName="sku" placeholder="Enter SKU" :isRequired='true' :isReadonly='false' :defaultValue="$product->sku" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.text label="Barcode" inputName="barcode" placeholder="Enter Barcode" :isRequired='true' :isReadonly='false' :defaultValue="$product->barcode" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.static-select label="Track QTY" inputName="track_qty" placeholder="Select One" :isRequired='true'  :isReadonly='false' :defaultValue="$product ? $product->track_qty : ''" :options="['yes','no']"/>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.text label="Quantity" inputName="qty" placeholder="Enter Quantity" :isRequired='true' :isReadonly='false' :defaultValue="$product->qty" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <x-forms.static-select label="Status" inputName="status" placeholder="Select One" :isRequired='true'  :isReadonly='false' :defaultValue="$product ? $product->status : ''" :options="['active','inactive']"/>
                                </div>
                            </div>
                            <button class="btn btn-info waves-effect waves-float waves-light float-right" type="submit">Update
                            </button>
                        </div>

                </div>
                <!-- /.card -->
            </div>
            <div class="col-2"></div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('script')

@endpush
