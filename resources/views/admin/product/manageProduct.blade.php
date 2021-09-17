@extends('admin.layouts.master')
@section('title','Manage-product')
@section('content')
<div class="container-fluid" >
    <div>
        <h2>Product Table</h2>
    </div>
    <div class="row">
        <div class="col-md-10  col-lg-12 m-auto">
            <table class="table table-responsive table-hover table-bordered">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Title</th>
                    <th>In_Stok</th>
                    <th>Quantity</th>
                    <th>Regular Price</th>
                    <th>Sale Price</th>
                    <th>Product Status</th>
                    <th>Product Image</th>
                    <th>Action</th>
                </thead>
              <tbody>
                 @foreach ($products as $product)
                  <tr>
                   <td>{{$product->id}}</td>
                   <td>{{$product->category->category_name}}</td>
                   <td>{{$product->title}}</td>
                   @if($product->in_stok===1)
                    <td><span class="bg-success text-white p-1">Available</span></td>
                   @else
                    <td><span class="bg-danger text-white p-1">UnAvailable</span></td>
                   @endif
                   <td>{{$product->quantity}}</td>
                   <td>TK. {{$product->regular_price}}</td>
                   
                   @if ($product->sale_price == null)
                    <td>TK. 00</td>
                   @else
                    <td>TK. {{$product->sale_price}}</td>
                   @endif
                   
                   @if ($product->product_status===1)
                       <td><span class="bg-success text-white p-1">{{$product->product_status===1? 'active':'inactive'}}</span></td>
                   @else
                        <td><span class="bg-danger text-white p-1">{{$product->product_status===1? 'active':'inactive'}}</span></td>
                   @endif
                   <td>
                   @foreach ($product->images as $image )
                   <img src="{{asset($image->image_one)}}" alt="" height="40px" width="40px">  
                   <img src="{{asset($image->image_two)}}" alt="" height="40px" width="40px">  
                   <img src="{{asset($image->image_three)}}" alt="" height="40px" width="40px">  
                   @endforeach
                    
                   
                   
                   </td>

                   <td >
                     <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-success mt-1"><span> <i class="far fa-edit"></i> </span></a>
                        <form id="delCategory" class="d-inline"  action="{{route('admin.product.destroy',$product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                           <button class="btn btn-danger mt-1" type="submit" onclick="return confirm('are you sure')"><i class="far fa-trash-alt"></i></button>
                       </form>
                    </td>
                  </tr>
                  @endforeach
                  
             
              </tbody>
                
            </table>
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection