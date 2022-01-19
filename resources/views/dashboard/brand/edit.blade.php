@extends('layout.master-backend')

@section('title')
    Update Brand
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/admin/brands/{{$brand->id}}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <h6>General info</h6>
                        </div>
                        <div class="col-md-9">
                            @csrf
                            @method('put')
                            <div class="form-group mb-4">
                                <label class="form-label">Brand Name</label>
                                <input type="text" name="name" placeholder="Type here" class="form-control" value="{{$brand->name}}">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Description</label>
                                <textarea name="description" placeholder="Type here" class="form-control" rows="4">{{$brand->description}}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Images</label>
                                <input name="image" class="form-control" type="file">
                                <img src="/brand/{{$brand->image}}" alt="image" width="300px">
                            </div>
                            <div class="formgroup mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/admin/brands" class="btn btn-secondary mx-3">Cancel</a>
                            </div>
                        </div> <!-- col.// -->
                    </div>
                </form> <!-- row.// -->
            </div>
        </div>
    </div>
</div>
@endsection