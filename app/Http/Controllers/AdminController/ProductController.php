<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ServiceController;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['products'] = Product::with('images','category')->select('id', 'category_id', 'title', 'in_stok', 'quantity', 'regular_price', 'sale_price', 'product_status')->simplePaginate(10);

		return view('admin.product.manageProduct', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data['categories'] = Category::select('id', 'category_name')->where('publication_status', '1')->get();
		return view('admin.product.addProduct', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

	
		$validate = $request->validate([
			'category_id' => 'required',
			'title' => 'required|unique:products,title',
			'description' => 'required',
			'regular_price' => 'required',
			'sale_price' => 'nullable',
			'product_status' => 'required',
			'image_one' => 'required|mimes:jpg,jpeg,png,JPEG',
			'image_two' => 'required|mimes:jpg,jpeg,png,JPEG',
			'image_three' => 'required|mimes:jpg,jpeg,png,JPEG',
		]);


		$product = new Product();

		$product->category_id = $request->input('category_id');
		$product->title = $request->input('title');
		$product->slug = Str::slug($request->input('title'));
		$product->description = $request->input('description');
		$product->quantity = $request->input('quantity');
		$product->regular_price = $request->input('regular_price');
		$product->sale_price = $request->input('sale_price');
		$product->product_status = $request->input('product_status');
		$product->save();

		
				$img_one= $request->file('image_one');
				$fileName_one = uniqid('image_', true) . Str::random(10) . '.' . $img_one->getClientOriginalExtension();
				$upload_path = 'uploads/product_images/';
				$image_url_one = $upload_path . $fileName_one;
				$img_one->move($upload_path, $fileName_one);


				$img_two= $request->file('image_two');
				$fileName_two = uniqid('image_', true) . Str::random(10) . '.' . $img_two->getClientOriginalExtension();
				$image_url_two = $upload_path . $fileName_two;
				$img_two->move($upload_path, $fileName_two);

				$img_three= $request->file('image_three');
				$fileName_three = uniqid('image_', true) . Str::random(10) . '.' . $img_three->getClientOriginalExtension();
				$image_url_three = $upload_path . $fileName_three;
				$img_three->move($upload_path, $fileName_three);


			Image::insert([
				'product_id' => $product->id,
				'image_one' => $image_url_one,
				'image_two' =>	$image_url_two,
				'image_three' =>$image_url_three,
				]);

				
		$message = "product successfully created";
		$getNotification = ServiceController::successMessage($message);
		return redirect()->back()->with($getNotification);
			

		}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data['categories']=Category::all();
		
		$data['product']= Product::with('images')->select('id', 'category_id', 'title','description', 'in_stok', 'quantity', 'regular_price', 'sale_price', 'product_status')->where('id',$id)->first();
		
		return view('admin.product.editProduct',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
	}

	public function updateProduct(Request $request,$id){
	
		
		$validate = $request->validate([
			'category_id' => 'required',
			'title' => 'required|unique:products,title,'.$id,
			'description' => 'required',
			'regular_price' => 'required',
			'sale_price' => 'nullable',
			'product_status' => 'required',
			'image_one' => 'mimes:jpg,jpeg,png,JPEG',
			'image_two' => 'mimes:jpg,jpeg,png,JPEG',
			'image_three' => 'mimes:jpg,jpeg,png,JPEG',
		]);

		$data=[
			'category_id'=> $request->input('category_id'),
			'title'=> $request->input('title'),
			'slug'=> Str::slug($request->input('title')),
			'description'=> $request->input('description'),
			'in_stok' => $request->input('in_stok'),
			'regular_price'=> $request->input('regular_price'),
			'sale_price'=> $request->input('sale_price'),
			'product_status'=> $request->input('product_status')
		];

		Product::find($id)->update($data);

	
		if($request->hasFile('image_one')){
			$image_one= $request->file('image_one');

				$fileName = uniqid('image_', true) . Str::random(10) . '.' . $image_one->getClientOriginalExtension();
				$upload_path = 'uploads/product_images/';
				$image_url = $upload_path . $fileName;
				$image_one->move($upload_path, $fileName);
				unlink($request->old_one);
				
			Image::where('product_id',$id)->update([
				'image_one'=> $image_url,
			]);


		}
		if($request->hasFile('image_two')){
			$image_two= $request->file('image_two');
			
			$fileName = uniqid('image_', true) . Str::random(10) . '.' . $image_two->getClientOriginalExtension();
			$upload_path = 'uploads/product_images/';
			$image_url = $upload_path . $fileName;
			$image_two->move($upload_path, $fileName);
			unlink($request->old_two);
			
		Image::where('product_id',$id)->update([
			'image_two'=> $image_url,
		]);

	}

		if($request->hasFile('image_three')){
			$image_three= $request->file('image_three');
			$fileName = uniqid('image_', true) . Str::random(10) . '.' . $image_three->getClientOriginalExtension();
			$upload_path = 'uploads/product_images/';
			$image_url = $upload_path . $fileName;
			$image_three->move($upload_path, $fileName);
			unlink($request->old_three);
			
		Image::where('product_id',$id)->update([
			'image_three'=> $image_url,
		]);
			
		}
		
		$message = "product successfully updated";
		$getNotification = ServiceController::successMessage($message);
		return redirect()->route('admin.product.index')->with($getNotification);

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$images=Image::select('image_one','image_two','image_three')->where('product_id',$id)->first();
		$image_one= $images->image_one;
		$image_two= $images->image_two;
		$image_three= $images->image_three;
	
		$product=Product::find($id);
		if($product){
			$product->delete();
			unlink($image_one);
			unlink($image_two);
			unlink($image_three);

			$message = "product has been deleted";
		$getNotification = ServiceController::successMessage($message);
		return redirect()->route('admin.product.index')->with($getNotification);
		}

	}
}
