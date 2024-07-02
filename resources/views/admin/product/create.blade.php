@extends('admin.layouts.app')
@section('title')
    Product Entry
@endsection
@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
@php
$links = [
'Home'=>'',
'Product Entry'=>''
]
@endphp
<x-breadcrumb title='Product' :links="$links"/>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('products.store')}}" method="POST" class=""
                          enctype="multipart/form-data">
                        @csrf
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Product Entry</h3>
                                <div class="card-tools">
                                    <a href="{{route('products.index')}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-list"
                                           aria-hidden="true"></i>
                                        &nbsp;See List

                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <x-forms.text label="Title" inputName="title"
                                                placeholder="Enter Title" :isRequired='true' :isReadonly='false'
                                                defaultValue="" />
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control" id="description" cols="5" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.text label="Price" inputName="price"
                                            placeholder="Enter Price" :isRequired='true' :isReadonly='false'
                                            defaultValue="" />
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.text label="Compare Price" inputName="compare_price"
                                            placeholder="Enter Compare Price" :isRequired='true' :isReadonly='false'
                                            defaultValue="" />
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.select label="Category" inputName="category_id"
                                            placeholder="Select One" :isRequired='true' :isReadonly='false' defaultValue=""
                                            :options="$categories" optionId="id" optionValue="name" />
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.select label="Sub Category" inputName="sub_category_id"
                                            placeholder="Select One" :isRequired='true' :isReadonly='false' defaultValue=""
                                            :options="$subCategories" optionId="id" optionValue="name" />
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.select label="Brand" inputName="brand_id"
                                            placeholder="Select One" :isRequired='true' :isReadonly='false' defaultValue=""
                                            :options="$brands" optionId="id" optionValue="name" />
                                    </div>
                                    {{-- <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.static-select label="Featured" inputName="is_featured"
                                            placeholder="Select One" :isRequired='true' :isReadonly='false' defaultValue=""
                                            :options="['Yes','No']" />
                                    </div> --}}
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.text label="SKU" inputName="sku"
                                            placeholder="Enter SKU" :isRequired='true' :isReadonly='false'
                                            defaultValue="" />
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.text label="Barcode" inputName="barcode"
                                            placeholder="Enter Barcode" :isRequired='true' :isReadonly='false'
                                            defaultValue="" />
                                    </div>
                                    {{-- <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <label for="track_qty">Track QTY</label>
                                        <input type="hidden" name="track_qty" value="no">
                                        <input type="checkbox" name="track_qty"  value="yes" checked>
                                    </div> --}}
                                    <div class="col-xl-4 col-md-4 col-12 mb-1">
                                        <x-forms.text label="Quantity" inputName="qty"
                                            placeholder="Enter Quantity" :isRequired='true' :isReadonly='false'
                                            defaultValue="" />
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-info btn-sm float-right"><i class="fa fa-check" aria-hidden="true"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
    </script>

@endpush
