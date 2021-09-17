@extends('admin.layouts.master')
@section('title','Manage-category')
@section('content')
<div class="container-fluid" >
    <div>
        <h2>Category Table</h2>
    </div>
    <div class="row">
        <div class="col-md-12 m-auto">
            <table class="table  table-hover table-bordered">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Slug Name</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </thead>
              <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->slug_name}}</td>

                       @if($category->publication_status===1)
                        <td><span class="bg-success text-white p-1">{{$category->publication_status===1 ? 'published':'unpublished'}}</span></td>
                      @else
                       <td><span class="bg-danger text-white p-1">{{$category->publication_status===1 ? 'published':'unpublished'}}</span></td>
                        @endif


                    <td>
                        <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-success mt-1"><span> <i class="far fa-edit"></i> </span></a>
                        <form id="delCategory" class="d-inline" action="{{route('admin.category.destroy',$category->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                           <button class="btn btn-danger mt-1" type="submit" onclick="return confirm('are you sure')"><i class="far fa-trash-alt"></i></button>
                       </form>
                    </td>
                  </tr>
                  @endforeach
              </tbody>

            </table>
            {{$categories->links()}}
        </div>
    </div>
</div>
@endsection