@extends('layout.master-backend')

@section('title', 'Create Product')

@section('content')
<div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>General Description</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="product_name" class="form-label">Product title</label>
                        <input type="text" placeholder="Type here" name="title" class="form-control" id="product_name">
                    </div>
                    <div class="mb-4">
                        <label for="product_slug" class="form-label">Slug</label>
                        <input type="text" placeholder="exp: product-title-here" name="slug" class="form-control" id="product_slug">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Full description</label>
                        <textarea placeholder="Type here" name="description" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">SKU</label>
                                <div class="row gx-2">
                                    <input placeholder="SKU" name="sku" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Color</label>
                                <select name="color" class="form-select">
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
                            <select name="size" class="form-select">
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
                                    <option value="{{$category->id}}">{{$category->name}}</option> 
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
                                    <option value="{{$brand->id}}">{{$brand->name}}</option> 
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
                                    <input placeholder="$" name="regular_price" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Promotional price</label>
                                <input placeholder="$" name="promo_price" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Stock</label>
                                <input placeholder="$" name="stock" type="number" class="form-control">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/admin/products" class="btn btn-secondary mx-3">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection