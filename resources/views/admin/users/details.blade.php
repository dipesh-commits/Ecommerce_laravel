@extends('admin.layouts.master')

@section('page')
Users order Details
@endsection

@section('contents')

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">{{ $orders[0]->user->name}} Order Details</h4>
                <p class="category">List of all registered users</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    	@foreach($orders as $order)
                    		<td>{{$order->id}}</td>
                    		<td>{{$order->products[0]->name}}</td>
                    		<td>{{ $order->address}}</td
                    			>
                    			<td>{{ $order->orderItems[0]->quantity}}</td>
                    			<td>{{ $order->orderItems[0]->price}}</td>
                    			<td>{{ $order->date}}</td>
                    			<td>
                    				@if($order->status)
                    					<span class="label label-success">COnfirmed</span>

                    				@else
                    				<span class="label label-warning">Pending</span>

                    				@endif
                    			</td>


                    	@endforeach
                    	 
                    </tr>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection