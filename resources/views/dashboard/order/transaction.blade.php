@extends('layout.master-backend')
@section('title', 'Transactions')

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
                        <th>Method</th>
                        <th>Date</th>
                        <th>Total Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $item) 
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->invoice}}</td>
                        <td>{{$item->first_name}} {{$item->last_name}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td class="text-muted" style="font-size: 24px">COD</td>
                        <td>
                            {{convert_date($item->updated_at)}}   
                        </td>
                        <td>@currency($item->total_payment)</td>
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