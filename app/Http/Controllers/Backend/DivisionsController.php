<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\District;


class DivisionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

    	$divisions = Division::orderBy('priority', 'asc')->get();
    	return view('backend.pages.divisions.index', compact('divisions'));
    }

     public function create(){

    	return view('backend.pages.divisions.create');
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'name' => 'required',
    		'priority' => 'required',

    	],
    	[
    		'name.required' => 'Please enter a category name',
            'priority.required' => 'Please provide a division priority',
    	]);

    	$division = new Division;

    	$division->name = $request->name;
    	$division->priority = $request->priority;
    	
    	$division->save();

    	session()->flash('success', 'A new division create successfully!!');
    	return redirect()->route('admin.divisions');
    }

    public function edit($id){

    	$division = Division::find($id);

    	if (!is_null($division)) {
    		return view('backend.pages.divisions.edit', compact('division'));
    	}else{
    		return redirect()->route('admin.divisions');
    	}
    }

    public function update(Request $request, $id){

     	$request->validate([
	        'name'      => 'required|max:150',
	        'priority' => 'required',
	        
	    ],
	    [
	    	'name.required' => 'Please enter a name',
	    	'priority.required' => 'Please provide a division prirority',
	    ]);

     	/* 
     	update category into Product
     	*/
    	$division = Division::find($id); 
    	$division->name = $request->name;
    	$division->priority = $request->priority;

    	$division->save();

    	session()->flash('success', 'Division updated successfully!!');
    	return redirect()->route('admin.divisions');
	}

	 public function delete($id){

        $division = Division::find($id); 

        if (!is_null($division)) {

            //Delete all the district for this district
            $districts = District::where('division_id', $division->id)->get();
            foreach ($districts as $district) {
                $district->delete();
            }
            $division->delete();
        }

        session()->flash('success', 'Division has deleted !!');
        return back();
    }
}
