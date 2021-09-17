@extends('admin.layouts.master')
@section('title','Edit-Category')
@section('content')


    
<div class="container-fluid" style="height: 100vh;">
<div class="category-form">
    <div class="row ">
        <div class="col-md-10 col-lg-7 m-auto">
            <div class="card ">
                    <div class="card-title bg-primary text-white">
                        <h3 class="text-center pt-2">Edit Category Info</h3>
                    </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">  
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>  
                    @endif
                
                    <form action="{{route('admin.category.update',$category->id)}}" method="POST">
                        @csrf
                         @method('PUT')
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" >
                            </div>
                            
                            <div class="form-group">
                                <label for="publication_status">Publication Staus</label>
                                <select class="form-control" name="publication_status">
                                <option value="1" @if ($category->publication_status===1) selected @endif selected>published</option>
                                <option value="0" @if ($category->publication_status===0) selected  @endif >unpublished</option>
                                </select>
                            </div>
                           <input class="btn btn-success form-control" type="submit" value="Update Category">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

   





@endsection