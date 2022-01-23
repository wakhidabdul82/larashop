@extends('layout.master-frontend')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a class="section">Home
            <span></span> Shop
            <span></span> {{$categoryName}}
            </a>
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p> We found <strong class="text-brand">{{$products->count()}}</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid-3">
                    @foreach($products as $key => $item)    
                    <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ $item->path() }}">
                                        <img class="default-img" src="{{asset('product/'.$item->image)}}" alt="">
                                        <img class="hover-img" src="{{asset('product/'.$item->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                                @if($item->brand_id == 1)   
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">{{$item->brands->name}}</span>
                                </div>
                                @elseif ($item->brand_id == 2) 
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">{{$item->brands->name}}</span>
                                </div>
                                @else
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">{{$item->brands->name}}</span>
                                </div>
                                @endif
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$item->categories->name}}</a>
                                </div>
                                <h2><a href="{{ $item->path() }}">{{$item->title}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>@currency($item->promo_price)</span>
                                    <span class="old-price">@currency($item->regular_price)</span>
                                </div>
                                <div class="product-action-1 show">
                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--pagination-->
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">16</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>
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