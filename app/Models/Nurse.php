<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    
	public $table = "nurses";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"last_name",
		"phone",
		"email",
		"password",
		"user_id"
	];

	public static $rules = [
	    "name" => "required",
		"last_name" => "required",
		"phone" => "required",
		"email" => "required",
		"password" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
