<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

	public $fillable = [
		'name',
		'priority'
	];

     public function district(){

    	return $this->hasMany(Division::class);
    }
}
