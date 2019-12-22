@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
            </div>
            <div class="card-header">
                Add Product
            </div>

            <div class="card-body border">

            @if (session('delete_status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('delete_status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.NO.</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Alert Quantity</th>
                            <th>Created At</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)

                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->alert_quantity}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a type="button" class="btn btn-warning">Edit</a>
                            <a type="button" class="btn btn-danger" href="{{url('product/delete')}}/{{$product->id}}">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan='5' class='text-center text-danger'>No Data Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
            </div>
            <div class="card-header">
                List
            </div>

            <div class="card-body border">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                @endif

                <!-- @if ($errors->all())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> @endif -->




                <!-- {{print_r($errors)}} -->


                <form method="post" action="{{ url('product/insert') }}">
                    @csrf
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Product Name" name="product_name" value="{{old('product_name')}}">

                        @error('product_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Product Price" name="product_price" value="{{old('product_price')}}">

                        @error('product_price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Product Quantity" name="product_quantity"
                            value="{{old('product_quantity')}}">

                        @error('product_quantity')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alert Quantity</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Alert Quantity" name="alert_quantity" value="{{old('alert_quantity')}}">

                        @error('alert_quantity')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
