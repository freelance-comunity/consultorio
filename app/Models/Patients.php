<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    
	public $table = "patients";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"last_name",
		"phone",
		"age",
		"address"
	];

	public static $rules = [
	    "name" => "required|alpha",
		"last_name" => "required|alpha",
		"phone" => "required|digits:10",
		"age" => "required|numeric",
		"address" => "required"
	];

	public function getFullName()
	{
		return $this->name.' '.$this->last_name;
	}

	public function consulations()
	{
		return $this->hasMany('App\Models\Consulation');
	}

}
