@extends('layout.master-backend')

@section('title')
    Brand List
@endsection

@push('script')
<script>
    var apiUrl = '{{url('admin/api/brands')}}';
    var actionUrl = '{{url('admin/brands')}}';
    var vue = new Vue({
        el: "#appVue",
        data: {
            brands: [],
            brand:{},
            apiUrl,
            actionUrl,
        },
        mounted() {
            
        },
        methods: {
            
            addData: function() {
                this.brand = {};
                $('#exampleData').modal('show');
            },   
        }
    });
</script>
@endpush

@section('content')
<div id="appVue">
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control">
                </div>
                <div class="col-md-2 justify-content-end">
                    <button class="btn btn-primary" v-on:click.prevent="addData"><i class="text-muted material-icons md-post_add"></i>Add</button>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3">
                @forelse (array_slice($brands->toArray(), 0, 10) as $item)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('image/'.$item['image'])}}" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0 mb-2">{{$item['name']}}</h6>
                                <a href="/admin/brands/{{$item['id']}}/edit"><span class="badge rounded-pill alert-info">Edit</span></a>
                                <a href="/admin/brands/{{$item['id']}}"><span class="badge rounded-pill alert-primary">View</span></a>
                            </figcaption>
                        </figure>
                    </div>
                @empty
                    <div>
                        <h3>Data Empty</h3>
                    </div>
                @endforelse
                 <!-- col.// -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleData" tabindex="-1" aria-labelledby="exampleDataLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form :action="actionUrl" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group mb-4">
                    <label class="form-label">Brand Name</label>
                    <input type="text" name="name" placeholder="Type here" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Description</label>
                    <textarea name="description" placeholder="Type here" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Images</label>
                    <input name="image" class="form-control" type="file">
                </div> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
        </div>
    </div>
</div>

@endsection