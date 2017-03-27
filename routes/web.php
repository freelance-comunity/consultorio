<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect('login');
});

Route::get('roles', function(){
	$admin = new App\Role();
	$admin->name         = 'admin';
	$admin->display_name = 'User Administrator'; // optional
	$admin->description  = 'User is allowed to manage and edit other users'; // optional
	$admin->save();

	$nurse = new App\Role();
	$nurse->name         = 'nurse';
	$nurse->display_name = 'Project nurse'; // optional
	$nurse->description  = 'User is the nurse of a given project'; // optional
	$nurse->save();

	echo "Listo";
});

Route::group(['prefix' => 'admin','middleware' => ['auth', 'is_admin'	]], function(){
	//Route::get('/', 'InternalController@index');
	//Route::get('/prueba', 'InternalController@prueba');
	
});

Route::group(['middleware' => 'auth'], function () {

	Route::resource('doctors', 'DoctorController');

	Route::get('doctors/{id}/delete', [
		'as' => 'doctors.delete',
		'uses' => 'DoctorController@destroy',
		]);

	Route::resource('patients', 'PatientsController');

	Route::get('patients/{id}/delete', [
		'as' => 'patients.delete',
		'uses' => 'PatientsController@destroy',
		]);

	Route::get('generate/{id}/', [
		'as' => 'patients.generate',
		'uses' => 'PatientsController@consulations',
		]);

	Route::resource('consulations', 'ConsulationController');

	Route::get('consulations/{id}/delete', [
		'as' => 'consulations.delete',
		'uses' => 'ConsulationController@destroy',
		]);

	Route::resource('nurses', 'NurseController');

	Route::get('nurses/{id}/delete', [
		'as' => 'nurses.delete',
		'uses' => 'NurseController@destroy',
		]);

	Route::get('viewconsulations/{id}', function($id){
		$patients = App\Models\Patients::find($id);
		$consulations = $patients->consulations;
		
		return view('patients.viewconsulations')
		->with('consulations',$consulations);
	});

	Route::get('print', function(){
		return view('consulations.print');
	});

	
});
