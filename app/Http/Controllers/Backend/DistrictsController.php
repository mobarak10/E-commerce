<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;



class DistrictsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

    	$districts = District::orderBy('name', 'asc')->with(['division'])->get();
    	return view('backend.pages.districts.index', compact('districts'));
    }

     public function create(){

        $divisions = Division::orderBy('priority', 'asc')->get();
    	return view('backend.pages.districts.create', compact('divisions'));
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'name' => 'required',
    		'division_id' => 'required',

    	],
    	[
    		'name.required' => 'Please enter a category name',
            'division_id.required' => 'Please provide a district division_id',
    	]);

    	$district = new District;

    	$district->name = $request->name;
    	$district->division_id = $request->division_id;
    	
    	$district->save();

    	session()->flash('success', 'A new district create successfully!!');
    	return redirect()->route('admin.districts');
    }

    public function edit($id){

    	$district = District::find($id);
        $divisions = Division::orderBy('priority', 'asc')->get();
        // dd($divisions);

        return view('backend.pages.districts.edit', compact('district', 'divisions'));

    	if (!is_null($district)) {
    		
    	}else{
    		return redirect()->route('admin.districts');
    	}
    }

    public function update(Request $request, $id){

     	$request->validate([
	        'name'      => 'required|max:150',
	        'division_id' => 'required',
	        
	    ],
	    [
	    	'name.required' => 'Please enter a name',
	    	'division_id.required' => 'Please provide a district division_id',
	    ]);

     	/* 
     	update category into Product
     	*/
    	$district = District::find($id); 
    	$district->name = $request->name;
    	$district->division_id = $request->division_id;

    	$district->save();

    	session()->flash('success', 'District updated successfully!!');
    	return redirect()->route('admin.districts');
	}

	 public function delete($id){

        $district = District::find($id); 

        if (!is_null($district)) {
            
            $district->delete();
        }

        session()->flash('success', 'District has deleted !!');
        return back();
    }
}
