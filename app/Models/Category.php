<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $fillable = [
        'name',
        'decription',
        'iamge',
        'parent_id'
    ];

    public function parent(){

    	//get all the parent_id from categories table in datebase
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products(){

    	//get all the id from products table in datebase main id is auto get that's why no paremeter is used
    	return $this->hasMany(Product::class);
    }

    //ParentOrNotCategory
    //Check the category is child category or parent category

    public static function ParentOrNotCategory($parent_id, $child_id){

    	$categories = Category::where('id', $child_id)->where('parent_id', $parent_id)->get();
    	if (!is_null($categories)) {
    		return true;
    	}else{
    		return false;
    	}
    }
}
