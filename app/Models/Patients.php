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
	    "name" => "required",
		"last_name" => "required",
		"phone" => "required",
		"age" => "required",
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
