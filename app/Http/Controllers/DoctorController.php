<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDoctorRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Hash;
use Alert;
use App\User;
use App\Role;

class DoctorController extends AppBaseController
{


	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	 /*public function __construct()
	 {
	 	$this->middleware("is_admin");
	 }*/
	public function index(Request $request)
	{
		$query = Doctor::query();
        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute){
            if($request[$attribute] == true)
            {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        $doctors = $query->get();

        return view('doctors.index')
            ->with('doctors', $doctors)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Doctor.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('doctors.create');
	}

	/**
	 * Store a newly created Doctor in storage.
	 *
	 * @param CreateDoctorRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDoctorRequest $request)
	{	
		$input = $request->all();
		/*Create User*/
		$name = $request->input('name');
		$email = $request->input('email');
       
		$datos['name'] = $name;
		$datos['email'] = $email;
		$datos['password'] = Hash::make($request->input('password'));

		/*Crear usuario de administrator*/
		$usuario = User::create($datos);
		$id = $usuario->id;
		$user = User::find($id);
		$admin = Role::find(1);
		$user->attachRole($admin);
		$input['user_id'] = $id;
		$input['password'] = Hash::make($request->input('password'));

		$doctor = Doctor::create($input);

		Alert::success('Medico dado de alta exitosamente!')->persistent("Cerrar");

		return redirect(route('doctors.index'));
	}

	/**
	 * Display the specified Doctor.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$doctor = Doctor::find($id);

		if(empty($doctor))
		{
			Flash::error('Doctor not found');
			return redirect(route('doctors.index'));
		}

		return view('doctors.show')->with('doctor', $doctor);
	}

	/**
	 * Show the form for editing the specified Doctor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$doctor = Doctor::find($id);

		if(empty($doctor))
		{
			Flash::error('Doctor not found');
			return redirect(route('doctors.index'));
		}

		return view('doctors.edit')->with('doctor', $doctor);
	}

	/**
	 * Update the specified Doctor in storage.
	 *
	 * @param  int    $id
	 * @param CreateDoctorRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDoctorRequest $request)
	{
		/** @var Doctor $doctor */
		$doctor = Doctor::find($id);

		if(empty($doctor))
		{
			Flash::error('Doctor not found');
			return redirect(route('doctors.index'));
		}

		$doctor->fill($request->all());
		$doctor->save();

		Alert::success('Datos editados exitosamente!')->persistent("Cerrar");

		return redirect(route('doctors.index'));
	}

	/**
	 * Remove the specified Doctor from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Doctor $doctor */
		$doctor = Doctor::find($id);

		if(empty($doctor))
		{
			Flash::error('Doctor not found');
			return redirect(route('doctors.index'));
		}

		$doctor->delete();

		Alert::success('Doctor Borrado Exitosamente!')->persistent("Cerrar");

		return redirect(route('doctors.index'));
	}
}
