@extends('layout.master-backend')

@section('title')
    Detail Brand : {{$brand->name}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3">
                    <div class="form-group mb-4">
                        <label class="form-label">Brand Name</label>
                        <input type="text" name="name" placeholder="Type here" class="form-control" value="{{$brand->name}}" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Description</label>
                        <textarea name="description" placeholder="Type here" class="form-control" rows="4" disabled>{{$brand->description}}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <img src="/image/{{$brand->image}}" alt="image" width="300px">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row gx-3">
                <form action="/admin/brands/{{$brand->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <a href="/admin/brands" class="btn btn-sm btn-outline-secondary">Back</a>
                    <input type="submit" class="btn btn-sm btn-outline-warning mx-3" value="Delete">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection