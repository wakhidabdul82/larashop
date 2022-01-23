@extends('layout.master-frontend')
@section('content')
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover bg-grey-10 mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-5 col-md-6">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">Trade-In Offer</h4>
                                        <h3 class="animated fw-900">Supper Value Deals</h3>
                                        <h2 class="animated fw-900 text-brand">On All Products</h2>
                                        <p class="animated">Save more with coupons & up to 70% off</p>
                                        <a class="animated btn btn-brush btn-brush-3" href="#" tabindex="0"> Shop Now </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="single-slider-img single-slider-img-1">
                                        <img class="animated" src="{{asset('assets/frontend/imgs/slider/slider-6.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-5 col-md-6">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">Hot promotions</h4>
                                        <h3 class="animated fw-900">Fashion Trending</h3>
                                        <h2 class="animated fw-900 text-brand">Great Collection</h2>
                                        <p class="animated">Save more with coupons & up to 20% off</p>
                                        <a class="animated btn btn-brush btn-brush-1" href="#" tabindex="0"> Get It Now </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="single-slider-img single-slider-img-1">
                                        <img class="animated" src="{{asset('assets/frontend/imgs/slider/slider-7.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>
    <section class="banners mb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{asset('assets/frontend/imgs/banner/banner-1.png')}}" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{asset('assets/frontend/imgs/banner/banner-2.png')}}" alt="">
                        <div class="banner-text">
                            <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="{{asset('assets/frontend/imgs/banner/banner-3.png')}}" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-25 pb-20">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach ($products as $item)
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ $item->path() }}">
                                    <img class="default-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                    <img class="hover-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-heart"></i></a>
                                </div>
                            @if ($item->brand_id == 1)
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">{{($item->brands['name'])}}</span>
                            </div>
                            @elseif($item->brand_id == 2)
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="sale">{{($item->brands['name'])}}</span>
                            </div>
                            @else
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">{{($item->brands['name'])}}</span>
                            </div>
                            @endif
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ $item->path() }}">{{Str::limit($item['title'], 12)}}</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>@currency($item['promo_price'])</span>
                                <span class="old-price">@currency($item['regular_price'])</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="bg-grey-9 section-padding">
        <div class="container pt-15 pb-25">
            <div class="heading-tab d-flex">
                <div class="heading-tab-left wow fadeIn animated">
                    <h3 class="section-title mb-20"><span>Monthly</span> Best Sell</h3>
                </div>
                <div class="heading-tab-right wow fadeIn animated">
                    <ul class="nav nav-tabs right no-border" id="myTab-1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-flex">
                    <div class="banner-img style-2 wow fadeIn animated">
                        <img src="{{asset('assets/frontend/imgs/banner/banner-9.jpg')}}" alt="">
                        <div class="banner-text">
                            <span>Woman Area</span>
                            <h4 class="mt-5">Save 17% on <br>Clothing</h4>
                            <a href="#" class="text-white">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="tab-content wow fadeIn animated" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    @foreach ($products as $item)   
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ $item->path() }}">
                                                    <img class="default-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                                    <img class="hover-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#"><i class="fi-rs-heart"></i></a>
                                            </div>
                                            @if ($item->brand_id == 1)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">{{($item->brands['name'])}}</span>
                                            </div>
                                            @elseif($item->brand_id == 2)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">{{($item->brands['name'])}}</span>
                                            </div>
                                            @else
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">{{($item->brands['name'])}}</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="#">{{$item->categories['name']}}</a>
                                            </div>
                                            <h2><a href="{{ $item->path() }}">{{Str::limit($item['title'], 12)}}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>@currency($item['promo_price'])</span>
                                                <span class="old-price">@currency($item['regular_price'])</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <!--End tab-pane-->
                        <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                    @foreach ($products as $item)   
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ $item->path() }}">
                                                    <img class="default-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                                    <img class="hover-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#"><i class="fi-rs-heart"></i></a>
                                            </div>
                                            @if ($item->brand_id == 1)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">{{($item->brands['name'])}}</span>
                                            </div>
                                            @elseif($item->brand_id == 2)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">{{($item->brands['name'])}}</span>
                                            </div>
                                            @else
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">{{($item->brands['name'])}}</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="#">{{$item->categories['name']}}</a>
                                            </div>
                                            <h2><a href="{{ $item->path() }}">{{Str::limit($item['title'], 12)}}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>@currency($item['promo_price'])</span>
                                                <span class="old-price">@currency($item['regular_price'])</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                    @foreach ($products as $item)   
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ $item->path() }}">
                                                    <img class="default-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                                    <img class="hover-img" src="{{asset('product/'.$item['image'])}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#"><i class="fi-rs-heart"></i></a>
                                            </div>
                                            @if ($item->brand_id == 1)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">{{($item->brands['name'])}}</span>
                                            </div>
                                            @elseif($item->brand_id == 2)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">{{($item->brands['name'])}}</span>
                                            </div>
                                            @else
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">{{($item->brands['name'])}}</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="#">{{$item->categories['name']}}</a>
                                            </div>
                                            <h2><a href="{{ $item->path() }}">{{Str::limit($item['title'], 12)}}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>@currency($item['promo_price'])</span>
                                                <span class="old-price">@currency($item['regular_price'])</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End tab-content-->
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>
@endsection