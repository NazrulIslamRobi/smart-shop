@extends('admin.layouts.master')
@section('title','Add-product')
@section('content')


    
<div class="container-fluid">
  
<div class="category-form">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card ">
                    <div class="card-title bg-primary text-white">
                        <h3 class="text-center pt-2">Add Product Info</h3>
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
                
                    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                            <div class="form-group">
                                <label for="category_name">Category List</label>
                                <select class="form-control" name="category_id">
                                    <option selected value hidden>---select your category---</option>
                                    @foreach ($categories as $category)
                                      <option value="{{$category->id}}">{{$category->category_name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_title">Product Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter product title" value="{{old('title')}}" >
                            </div>
                            
                            <div class="form-group">
                            <label for="product_description">Product Description</label>
                                <textarea class="form-control"  rows="8" name="description" resize="none" >{{old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_quantity">Product Quantity</label>
                                <input type="text" class="form-control" name="quantity" placeholder="Enter product Quantity" value="{{old('quantity')}}">
                            </div>
                            <div class="form-group">
                                <label for="regular_price">Regular Price</label>
                                <input type="text" class="form-control" name="regular_price" placeholder="Enter product regular price" value="{{old('regular_price')}}">
                            </div>
                            <div class="form-group">
                                <label for="sale_price">Sale Price</label>
                                <input type="text" class="form-control" name="sale_price" placeholder="Enter product sale price" value="{{old('sale_price')}}">
                            </div>

                           

                                <div class="form-group">
                                      <label for="product_image">product Image</label>
                                <div class="row">
                                  
                                        <div class="col-md-4 mb-2">
                                            <span>Thumbnail image</span>
                                            <input type="file" name="image_one" id="">
                                        </div>
                                        <div class="col-md-4 mb-2">
                                        <span>image Two</span>
                                            <input type="file" name="image_two" id="">
                                        </div>
                                        <div class="col-md-4 mb-2">
                                        <span>image Three</span>
                                            <input type="file" name="image_three" id="">
                                        </div>
                                </div>    
                            </div>      
                                     
                                            
                                      
                               
                            
                            <div class="form-group">
                                <label for="product_status">Product Status</label>
                                <select class="form-control" name="product_status">
                                <option value="1">active</option>
                                <option value="0">inactive</option>
                                </select>
                            </div>
                           <input class="btn btn-success form-control" type="submit" value="Save Product">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

   





@endsection