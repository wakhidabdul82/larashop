@extends('layout.master-frontend')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Shop
            <span></span> {{$product->title}}
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{asset('product/'.$product->image)}}" alt="product image">
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div><img src="{{asset('product/'.$product->image)}}" alt="product image"></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="{{asset('assets/frontend/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="{{asset('assets/frontend/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="{{asset('assets/frontend/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="{{asset('assets/frontend/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h2 class="title-detail">{{$product->title}}</h2>
                                <div class="product-detail-rating">
                                    <div class="pro-details-brand">
                                        <span> Brands: {{$product->brands->name}}</span>
                                    </div>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <ins><span class="text-brand">@currency($product->promo_price)</span></ins>
                                        <ins><span class="old-price font-md ml-15">@currency($product->regular_price)</span></ins>
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                <div class="short-desc mb-30">
                                    <p>{{$product->description}}</p>
                                </div>
                                <div class="attr-detail attr-color mb-15">
                                    <strong class="mr-10">Color</strong>
                                    <ul class="list-filter color-filter">
                                        @if($product->color == 'red')
                                        <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                        @elseif($product->color == 'green')
                                        <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                        @elseif($product->color == 'yellow')
                                        <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                        @elseif($product->color == 'black')
                                        <li><a href="#" data-color="Black"><span class="product-color-black"></span></a></li>
                                        @elseif($product->color == 'white')
                                        <li><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                        @elseif($product->color == 'navi')
                                        <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                        @elseif($product->color == 'blue')
                                        <li><a href="#" data-color="Blue"><span class="product-color-blue"></span></a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="attr-detail attr-size">
                                    <strong class="mr-10">Size</strong>
                                    <ul class="list-filter size-filter font-small">
                                        <li class="active"><a href="">{{Str::upper($product->size)}}</a></li>
                                    </ul>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>
                                </div>
                                <ul class="product-meta font-xs color-grey mt-50">
                                    <li class="mb-5">SKU: <a href="#">{{$product->sku}}</a></li>
                                    <li>Availability:<span class="in-stock text-success ml-5">{{$product->stock}} Items In Stock</span></li>
                                </ul>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            <div class="tab-pane fade" id="Description">
                                <div class="">
                                    <p>Detail description page here!</p>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="Reviews">
                                <!--Comments-->
                                
                                <!--comment form-->
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    <div class="product-rate d-inline-block mb-30">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">Submit
                                                        Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-60">
                        <div class="col-12">
                            <h3 class="section-title style-1 mb-30">Related products</h3>
                        </div>
                        <div class="col-12">
                            <div class="row related-products">
                                @foreach ($mightLike as $product)
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap small hover-up">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ $product->path() }}" tabindex="0">
                                                    <img class="default-img" src="{{asset('product/'.$product->image)}}" alt="">
                                                    <img class="hover-img" src="{{asset('product/'.$product->image)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                            </div>
                                            @if ($product->brand_id == 1)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">{{($product->brands['name'])}}</span>
                                            </div>
                                            @elseif($product->brand_id == 2)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">{{($product->brands['name'])}}</span>
                                            </div>
                                            @else
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">{{($product->brands['name'])}}</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="{{ $product->path() }}" tabindex="0">{{$product->title}}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>@currency($product->promo_price)</span>
                                                <span class="old-price">@currency($product->regular_price)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="widget-category mb-30">
                    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                    <ul class="categories">
                        @foreach ($categories as $category)
                        <li><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{$category->name}}</a></li>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <li><a href="/shop">View All</a></li>
                    </ul>
                </div>
                <!-- Fillter By Price -->
                <div class="sidebar-widget price_range range mb-30">
                    <div class="widget-header position-relative mb-20 pb-10">
                        <h5 class="widget-title mb-10">Fill by price</h5>
                        <div class="bt-1 border-color-1"></div>
                    </div>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            <label class="fw-900">Color</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                <br>
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                <br>
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                            </div>
                            <label class="fw-900 mt-15">Item Condition</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                <br>
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="">
                                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                <br>
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="">
                                <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                            </div>
                        </div>
                    </div>
                    <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                </div>
                <!-- Product sidebar Widget -->
            </div>
        </div>
    </div>
</section>
@endsection