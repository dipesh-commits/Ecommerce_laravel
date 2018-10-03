@extends('front.layouts.master')

@section('page')
Sign up

@endsection

@section('contents')

  <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Sign Up</h2>

                    @if($errors->any())
                    	@foreach($errors->all() as $error)
                    	 <div class="alert alert-danger">
                    		{{$error}}
                    	</div>
                    	@endforeach

                    @endif
                    <hr>
                    <form action="/user/register" method="post">

                    	{{ csrf_field()}}

                    	<div class="form-group">
                            <label for="name">Username:</label>
                            <input type="text" name="name" placeholder="Username" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>

                         <div class="form-group">
                            <label for="password_confirmation">Confirm password:</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" placeholder="Address" id="address" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection