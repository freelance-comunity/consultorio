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

	Route::resource('consulations', 'ConsulationsController');

	Route::get('consulations/{id}/delete', [
		'as' => 'consulations.delete',
		'uses' => 'PatientsController@destroy',
		]);
});
