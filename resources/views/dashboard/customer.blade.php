@extends('layout.master-backend')

@section('title', 'List Customers')

@section('content')

<div class="card mb-4">
    <header class="card-header">
        <div class="row gx-3">
            <div class="col-lg-4 col-md-6 me-auto">
                <input type="text" placeholder="Search..." class="form-control">
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <select class="form-select">
                    <option>Show 20</option>
                    <option>Show 30</option>
                    <option>Show 40</option>
                </select>
            </div>
        </div>
    </header> <!-- card-header end// -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $item) 
                    <tr>
                        <td width="40%">
                            <a href="#" class="itemside">
                                <div class="left">
                                    <img src="{{asset('customer/'.$item['image'])}}" class="img-sm img-avatar" alt="Userpic">
                                </div>
                                <div class="info pl-3">
                                    <h6 class="mb-0 title">{{$item->first_name}}&nbsp{{$item->last_name}}</h6>
                                    <small class="text-muted">Customer ID: {{$item->id}}</small>
                                </div>
                            </a>
                        </td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td><span class="badge rounded-pill alert-success">Active</span></td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                    @empty
                        <div>
                            <h4>Data Empty</h4>
                        </div>
                    @endforelse 
                </tbody>
            </table> <!-- table-responsive.// -->
        </div>
    </div> <!-- card-body end// -->
</div>
<div class="pagination-area mt-15 mb-50">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">
            <li class="page-item active"><a class="page-link" href="#">01</a></li>
            <li class="page-item"><a class="page-link" href="#">02</a></li>
            <li class="page-item"><a class="page-link" href="#">03</a></li>
            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">16</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
        </ul>
    </nav>
</div>
@endsection