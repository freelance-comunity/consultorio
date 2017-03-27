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
	    "name" => "required|alpha",
		"last_name" => "required|alpha",
		"phone" => "required|digits:10",
		"email" => "required|email",
		"password" => "required"
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
