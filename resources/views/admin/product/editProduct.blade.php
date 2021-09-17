@extends('admin.layouts.master')
@section('title','Edit-product')
@section('content')



<div class="container-fluid">
<div class="category-form">
    <div class="row">
        <div class="col-md-12 col-lg-10 m-auto">
            <div class="card ">
                    <div class="card-title bg-primary text-white">
                        <h3 class="text-center pt-2">Edit Product Info</h3>
                    </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                             @endforeach
                            </ul>
                    </div>
                    @endif

                    <form action="{{route('admin.update.product',$product->id)}}" method="POST"   enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                            <div class="form-group">
                                <label for="category_name">Category List</label>
                                <select class="form-control" name="category_id">
                                    <option selected value hidden>---select your category---</option>
                                    @foreach ($categories as $category)
                                      <option @if($category->id=== $product->category->id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_title">Product Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter product title" value="{{$product->title}}" >
                            </div>

                            <div class="form-group">
                            <label for="product_description">Product Description</label>
                                <textarea class="form-control"  rows="8" name="description" resize="none" >{{$product->description}}</textarea>
                            </div>
                             <div class="form-group">
                            <label for="in_stok">Stok Status</label>
                              <select class="form-control" name="in_stok">
                                  <option @if($product->in_stok===1) selected @endif  value="1">Available</option>
                                  <option @if($product->in_stok===0) selected @endif  value="0">UnAvailable</option>
                              </select>

                            </div>
                            <div class="form-group">
                                <label for="product_quantity">Product Quantity</label>
                                <input type="text" class="form-control" name="quantity" placeholder="Enter product Quantity" value="{{$product->quantity}}">
                            </div>
                            <div class="form-group">
                                <label for="regular_price">Regular Price</label>
                                <input type="text" class="form-control" name="regular_price" placeholder="Enter product regular price" value="{{$product->regular_price}}">
                            </div>
                            <div class="form-group">
                                <label for="sale_price">Sale Price</label>
                                <input type="text" class="form-control" name="sale_price" placeholder="Enter product sale price" value="{{$product->sale_price}}">
                            </div>



                                <div class="form-group">
                                      <label for="product_image">product Image</label>
                                <div class="row">

                                        <div class="col-md-3">
                                            <span>Thumbnail Image</span>
                                            <input type="file" name="image_one" id="">
                                       Old image: <img class="mt-1" style="width: 50%; height:50%;"src="{{asset($product->images[0]->image_one)}}" alt="">
                                       <input type="hidden" name="old_one" value="{{$product->images[0]->image_one}}">
                                        </div>
                                        <div class="col-md-3">
                                              <span>Image One</span>
                                            <input type="file" name="image_two" id="">
                                            Old image: <img class="mt-1" style="width: 50%; height:50%;" src="{{asset($product->images[0]->image_two)}}" alt="">
                                            <input type="hidden" name="old_two" value="{{$product->images[0]->image_two}}">
                                        </div>
                                        <div class="col-md-3">
                                              <span>Image Two</span>
                                            <input type="file" name="image_three" id="">
                                            Old image:  <img class="mt-1" style="width: 50%; height:50%;" src="{{asset($product->images[0]->image_three)}}" alt="">
                                            <input type="hidden" name="old_three" value="{{$product->images[0]->image_three}}">
                                        </div>
                                </div>
                            </div>





                            <div class="form-group">
                                <label for="product_status">Product Status</label>
                                <select class="form-control" name="product_status">
                                <option value="1" @if($product->product_status===1) selected  @endif>active</option>
                                <option value="0" @if($product->product_status===0) selected  @endif>inactive</option>
                                </select>
                            </div>
                           <input class="btn btn-success form-control" type="submit" value="Update Product">

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>







@endsection