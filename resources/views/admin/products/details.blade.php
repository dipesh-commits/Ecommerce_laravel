@extends('admin.layouts.master')

@section('page')
	Product details
@endsection

@section('contents')

	 <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Product Detail</h4>
                                <p class="category">List of all stock</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>

                                        <tr>
                                            <th>ID</th>
                                            <td>{{$products->id}}</td>
                                        </tr>

                                        <tr>
                                            <th>Name</th>
                                            <td>{{$products->name}}</td>
                                        </tr>

                                        <tr>
                                            <th>Description</th>
                                            <td>{{$products->description}}</td>
                                        </tr>

                                        <tr>
                                            <th>Price</th>
                                            <td>{{$products->price}}</td>
                                        </tr>

                                        <tr>
                                            <th>Created At</th>
                                            <td>{{$products->created_at->diffForHumans()}}</td>
                                        </tr>

                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{$products->updated_at->diffForHumans()}}</td>
                                        </tr>

                                        <tr>
                                            <th>Image</th>
                                            <td><img src="{{url('uploads').'/'.$products->image}}" alt="" class="img-thumbnail" style="width: 150px;"></td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
	
@endsection