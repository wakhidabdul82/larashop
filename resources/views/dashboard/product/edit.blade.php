@extends('layout.master-backend')

@section('title', 'Update Product')

@section('content')
<div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>General Description</h4>
                </div>
                <form action="/admin/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="product_name" class="form-label">Product title</label>
                        <input type="text" placeholder="Type here" name="title" class="form-control" id="product_name" value="{{$product->title}}">
                    </div>
                    <div class="mb-4">
                        <label for="product_slug" class="form-label">Slug</label>
                        <input type="text" placeholder="Type here" name="slug" class="form-control" id="product_slug" value="{{$product->slug}}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Full description</label>
                        <textarea placeholder="Type here" name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">SKU</label>
                                <div class="row gx-2">
                                    <input placeholder="SKU" name="sku" type="text" class="form-control" value="{{$product->sku}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Color</label>
                                <select name="color" class="form-select" value="{{$product->color}}>
                                    <option selected>Select Color</option>
                                    <option value="red"> Red </option>
                                    <option value="green"> Green </option>
                                    <option value="blue"> Blue </option>
                                    <option value="yellow"> Yellow </option>
                                    <option value="black"> Black </option>
                                    <option value="white"> White </option>
                                    <option value="navi"> Navi </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Size</label>
                            <select name="size" class="form-select" value="{{$product->size}}>
                                <option selected>Select Size</option>
                                <option value="s"> Small </option>
                                <option value="m"> Medium </option>
                                <option value="l"> Large </option>
                                <option value="xl"> Extra Large </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-select">
                                    <option selected>Select Category</option> 
                                    @foreach($categories as $key => $category)
                                    @if ($category->id === $product->category_id)
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Brand</label>
                                <select name="brand_id" class="form-select">
                                    <option selected>Select Brand</option> 
                                    @foreach($brands as $key => $brand)
                                        @if ($brand->id === $product->brand_id)
                                            <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                        @else
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endif 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Regular price</label>
                                <div class="row gx-2">
                                    <input placeholder="$" name="regular_price" type="number" step="0.01" class="form-control" value="{{$product->regular_price}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Promotional price</label>
                                <input placeholder="$" name="promo_price" type="number" step="0.01" class="form-control" value="{{$product->promo_price}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Stock</label>
                                <input placeholder="$" name="stock" type="number" class="form-control" value="{{$product->stock}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mb-4">
                        <div class="input-upload">
                            <img src="{{asset('assets/backend/imgs/theme/upload.svg')}}" alt="">
                            <input name="image" class="form-control" type="file">
                        </div>
                    </div>
                    <div class="formgroup mt-4">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="/admin/products" class="btn btn-secondary mx-3">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
</div>
@endsection>