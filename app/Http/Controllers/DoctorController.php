<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDoctorRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class DoctorController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
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
        // generar un password
		$random_password = str_random(8);
		$datos['name'] = $name;
		$datos['email'] = $email;
		$datos['password'] = Hash::make($random_password);
		/*Mail*/
		$data['name'] = $name;
		$data['pass'] = $random_password;
		$data['email'] = $email;
		/*Crear usuario de alumno*/
		$usuario = User::create($datos);
		$id = $usuario->id;
		$user = User::find($id);
		$student = Role::find(1);
		$user->attachRole($student);
		$input['user_id'] = $id;
		$input['password'] = $random_password;
		/**/
        

		$doctor = Doctor::create($input);

		Flash::message('Doctor saved successfully.');

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

		Flash::message('Doctor updated successfully.');

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

		Flash::message('Doctor deleted successfully.');

		return redirect(route('doctors.index'));
	}
}
