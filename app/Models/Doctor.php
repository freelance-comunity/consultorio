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
		"professional_id",
		"email",
		"password",
		"user_id"
	];

	public static $rules = [
	    "name" => "required|alpha",
		"last_name" => "required|alpha",
		"phone" => "required|digits:10",
		"professional_id" => "required",
		"email" => "required|email",
		"password" => "required",
	];

	public function getFullNameAttribute()
    {
        return preg_replace('/\s+/', ' ',$this->name.' '.$this->last_name);
    }

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function consulations()
	{
		return $this->hasMany('App\Models\Consulation');
	}

}
