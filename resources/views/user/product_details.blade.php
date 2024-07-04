@extends('user.layouts.app')
@section('content')
<main>
    <section class="section-7 pt-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-5">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{ asset('upload') }}/{{ $product->image }}" alt="">
                    </div>
                    {{-- <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner bg-light">
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="{{ asset('upload') }}/{{ $product->image[0] }}" alt="Image">
                            </div>
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="{{ asset('frontend') }}/images/product-2.jpg" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="{{ asset('frontend') }}/images/product-3.jpg" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="{{ asset('frontend') }}/images/product-4.jpg" alt="Image">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div> --}}
                </div>
                <div class="col-md-7">
                    <div class="bg-light right">
                        <h1>{{ $product->name }}</h1>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        <h2 class="price text-secondary"><del>${{ $product->compare_price }}</del></h2>
                        <h2 class="price ">${{ $product->price }}</h2>

                        <p>{{ $product->description }}</p>
                        <a href="cart.php" class="btn btn-dark"><i class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART</a>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="bg-light">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping & Returns</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <p>
                                {{ $product->description }}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi.</p>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            
                            </div>
                        </div>
                    </div>
                </div> 
            </div>           
        </div>
    </section>

    <section class="pt-5 section-8">
        <div class="container">
            <div class="section-title">
                <h2>Related Products</h2>
            </div> 
            <div class="col-md-12">
                <div id="related-products" class="carousel">
                    @foreach ($relatedProduct as $item)
                        <div id="related-products" class="carousel">
                            <div class="card product-card">
                                <div class="product-image position-relative">
                                    <a href="{{ route('product.details', $item->slug) }}" class="product-img"><img class="card-img-top" src="{{ asset('upload') }}/{{ $item->image }}" alt=""></a>
                                    <a class="whishlist" href="222"><i class="far fa-heart"></i></a>                            
    
                                    <div class="product-action">
                                        <a class="btn btn-dark" href="#">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </a>                            
                                    </div>
                                </div>
                                                        
                                <div class="card-body text-center mt-3">
                                    <a class="h6 link" href="">{{ $item->name }}</a>
                                    <div class="price mt-2">
                                        <span class="h5"><strong>${{ $item->price }}</strong></span>
                                        <span class="h6 text-underline"><del>${{ $item->compare_price }}</del></span>
                                    </div>
                                </div>   
                            </div> 
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection