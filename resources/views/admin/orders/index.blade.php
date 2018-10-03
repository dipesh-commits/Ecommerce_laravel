@extends('admin.layouts.master')

@section('page')
Orders
@endsection

@section('contents')
 <div class="row">

<div class="col-md-12">

	@if(session()->has('msg'))
	<div class="alert alert-success" >
		{{ session()->get('msg') }}
	</div>
	@endif

<div class="card">
<div class="header">
    <h4 class="title">Orders</h4>


    <p class="category">List of all orders</p>
</div>
<div class="content table-responsive table-full-width">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Product</th>
            <th>Quantity</th>
            
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        	
       @foreach($orders as $order)
        <tr>
        	
            <td>{{ $order->id }}</td>
            <td>Dipesh</td>
            <td>
            	@foreach($order->products as $items)
            	{{ $items->name}}
            	@endforeach

            </td>

              <td>
            	@foreach($order->Orderitems as $items)
            	{{ $items->quantity }}
            	@endforeach

            </td>

            <td>
            	@if($order->status)
            	<span class="label label-success">COnfirmed</span>

            	@else

            	<span class="label label-warning">Pending</span>
			 @endif
        </td>

            
            
            
           
   
            <td>
            	@if($order->status)

            	{{ link_to_route('order.pending','Pending',$order->id,['class'=>'btn btn-warning btn-sm']) }}

            	@else
            	{{ link_to_route('order.confirm','Confirm',$order->id,['class'=>'btn btn-success btn-sm'])}}

            	@endif

            	{{ link_to_route('orders.show','Details',$order->id,['class'=>'btn btn-success btn-sm'])}} 
                
            </td>

           
        </tr>

         @endforeach

       
      

        </tbody>
    </table>

</div>
</div>
</div>


                </div>
@endsection