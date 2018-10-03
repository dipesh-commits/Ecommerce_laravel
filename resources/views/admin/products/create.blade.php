@extends('admin.layouts.master')


@section('page')
Add products
@endsection
@section('contents')

  <div class="row">
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">Add Product</h4>
                </div>

               @include('admin.products.successmsg')

                <div class="content">
                    {!! Form::open(['url' => 'admin/products','files'=>'true']) !!}
                        <div class="row">
                            <div class="col-md-12">
                               
                            	@include('admin.products.field')
                            </div>

                        </div>
                        <div class="form group">
                        	{{ Form::submit('Add Products',['class'=>'btn btn-info btn-fill btn-wd']) }}
                           
                        	
                        </div>
                        <div class="clearfix"></div>
                    {!! Form::close() !!}
                </div>
                        </div>
                    </div>
                </div>


@endsection