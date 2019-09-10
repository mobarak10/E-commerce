<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;
use File; 


class BrandsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

    	$brands = Brand::orderBy('id', 'desc')->get();
    	return view('backend.pages.brands.index', compact('brands'));
    }

     public function create(){

    	return view('backend.pages.brands.create');
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'name' => 'required',
    		'image' => 'nullable|image',

    	],
    	[
    		'name.required' => 'Please enter a brand name',
    		'image.image' => 'Please enter a valid image with .jpg .pgn .gif .jpeg extention...',
    	]);

    	$brand = new Brand;

    	$brand->name = $request->name;
    	$brand->description = $request->description;
    	//insert image
    	if (count($request->image) > 0) {
    	
    		$image = $request->file('image');
    		$img = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/brands/'.$img);
    		Image::make($image)->save($location);

    		$brand->image = $img; 	
    	}

    	$brand->save();

    	session()->flash('success', 'A new brand create successfully!!');
    	return redirect()->route('admin.brands');
    }

    public function edit($id){

    	$brand = Brand::find($id);

    	if (!is_null($brand)) {
    		return view('backend.pages.brands.edit', compact('brand'));
    	}else{
    		return redirect()->route('admin.brands');
    	}
    }

    public function update(Request $request, $id){

     	$request->validate([
	        'name'      => 'required|max:150',
	        'image' => 'nullable|image',
	        
	    ],
	    [
	    	'name.required' => 'Please enter a name',
	    	'image.image' => 'Please enter a valid image with .jpg .pgn .gif .jpeg extention...',
	    ]);

     	/* 
     	update category into Product
     	*/
    	$brand = Brand::find($id); 
    	$brand->name = $request->name;
    	$brand->description = $request->description;

    	if (count($request->image) > 0) {

    		//Delete the old image
    		if (File::exists('images/brands/'.$brand->image)) {
    			File::delete('images/brands/'.$brand->image);
    		}
    	
    		$image = $request->file('image');
    		$img = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/brands/'.$img);
    		Image::make($image)->save($location);

    		$brand->image = $img; 	
    	}

    	$brand->save();

    	session()->flash('success', 'Brand updated successfully!!');
    	return redirect()->route('admin.brands');
	}

	 public function delete($id){
        $brand = Brand::find($id);

        if (!is_null($brand)) {

        	//Delete image
        	if (File::exists('images/brands/'.$brand->image)) {
    			File::delete('images/brands/'.$brand->image);
    		}
            $brand->delete();
        }

        session()->flash('success', 'Brand has deleted !!');
        return back();
    }
}
