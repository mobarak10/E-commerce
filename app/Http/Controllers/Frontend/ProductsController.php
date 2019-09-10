<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
   public function index(){
     	$products = Product::orderBy('id', 'desc')->paginate(8);
    	return view('frontend.pages.products.index', compact('products'));
    }

    public function show($slug){

    	$product = Product::where('slug', $slug)->first();
    	if (!is_null($product)) {

    		return view('frontend.pages.products.show', compact('product'));
    	}else{
            
    		session()->flash('has_error', 'Sorry no product to this URL...');
    		return redirect()->route('products');
    	}
    }
}
