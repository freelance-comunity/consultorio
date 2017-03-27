<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulation extends Model
{
    
	public $table = "consulations";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name_patients",
		"name_doctor",
		"date",
		"weight",
		"temperature",
		"treatment",
		"patients_id",
		"doctors_id"
	];

	public static $rules = [
	    "name_patients" => "required",
		"name_doctor" => "required",
		"date" => "required",
		"weight" => "required",
		"temperature" => "required",
		"treatment" => "required"
	];

	public function patients()
	{
		return $this->belongsTo('App\Models\Patients');
	}

	public function doctor()
	{
		return $this->belongsTo('App\Models\Doctor');
	}

}
