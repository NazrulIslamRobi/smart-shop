<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\ServiceController;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories']=Category::select('id','category_name','slug_name','publication_status')->simplePaginate(10);
        return view('admin.category.manageCategory',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
           'category_name'=> 'required|unique:categories,category_name',
           
       ]);

       $data=[
           'category_name'=> $request->input('category_name'),
           'slug_name'=> Str::slug($request->input('category_name')),
           'publication_status'=> $request->input('publication_status'),
           
       ];
       
       if(Category::insert($data)){
        $notification= [
            'alert-type'=> 'success',
            'message'=> 'category successfully created'
        ];
        return redirect()->back()->with($notification);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['category']=Category::find($id);
        return view('admin.category.editCategory',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated= $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$id,
        ]);

        Category::find($id)->update([
            'category_name' => $request->input('category_name'),
            'slug_name' => $request->input('category_name'),
            'publication_status' => $request->input('publication_status'),
        ]);
        $message= "category has been updated";
       $getNotification= ServiceController::successMessage($message);
        return redirect()->route('admin.category.index')->with($getNotification);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        Category::find($id)->delete();
        $message= 'category has been deleted';
        $getMessage= ServiceController::successMessage($message);
        return redirect()->route('admin.category.index')->with($getMessage);
    }
}
