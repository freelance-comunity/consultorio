<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    
	public $table = "doctors";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"last_name",
		"phone",
		"cedula",
		"email",
		"password"
	];

	public static $rules = [
	    "name" => "required",
		"last_name" => "required",
		"phone" => "required",
		"cedula" => "required",
		"email",
		"password"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
