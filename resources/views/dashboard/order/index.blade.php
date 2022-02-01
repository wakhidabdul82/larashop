@extends('layout.master-backend')

@section('title', 'List Orders')

@section('content')

<div class="card mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Customer</th>
                        <th>Phone Number</th>
                        <th>Tracking Number</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $item) 
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->invoice}}</td>
                        <td>{{$item->first_name}} {{$item->last_name}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td>{{$item->tracking_number}}</td>
                        <td>
                            @if($item->status == 'pending')
                            <span class="badge rounded-pill alert-warning">Pending</span>
                            @else
                            <span class="badge rounded-pill alert-success">{{$item->status}}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/admin/orders/{{$item->id}}/edit" class="btn btn-sm" style="background: #609bbd; color:white">Update</a>
                        </td>
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
<div class="mb-30">
    {!! $orders->appends(Request::all())->links() !!}
</div>
@endsection