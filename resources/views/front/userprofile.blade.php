@extends('front.layouts.master')

@section('page')

User Profile

@endsection

@section('contents')
<br>

<h2>User Details</h2>

<table class="table table-bordered col-md-12">
	<thead>
	<tr>
		<th colspan="2">User details<a href="#" class="pull-right"><i class="fa fa-cogs"></i>Edit User</a></th>
	</tr>
	</thead>

	<tbody>
		<tr>
			<th>ID</th>
			<td>{{$user->id}}</td>
		</tr>

		<tr>
			<th>Name</th>
			<td>{{$user->name}}</td>
		</tr>

		<tr>
			<th>Email</th>
			<td>{{$user->email}}</td>
		</tr>

		<tr>
			<th>Register at</th>
			<td>{{$user->created_at}}</td>
		</tr>
	</tbody>
</table>

 <table class="table table-striped table-bordered">
 	<h2>Order Details</h2>
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
        	
       @foreach($user->order as $order)
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
            	

            	

            	<a href="{{url('user/orderdetails').'/'.$order->id}}" class="btn btn-primary">Details</a>
                
            </td>

           
        </tr>

         @endforeach

       
      

        </tbody>
    </table>


@endsection