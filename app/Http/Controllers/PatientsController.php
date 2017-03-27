<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePatientsRequest;
use App\Models\Patients;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use Auth;


class PatientsController extends AppBaseController
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
		$query = Patients::query();
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

        $patients = $query->get();

        return view('patients.index')
            ->with('patients', $patients)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Patients.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('patients.create');
	}

	/**
	 * Store a newly created Patients in storage.
	 *
	 * @param CreatePatientsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePatientsRequest $request)
	{
        $input = $request->all();

		$patients = Patients::create($input);

		Alert::success('Paciente dado de alta exitosamente!')->persistent("Cerrar");

		return redirect(route('patients.index'));
		
	}

	/**
	 * Display the specified Patients.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$patients = Patients::find($id);

		if(empty($patients))
		{
			Flash::error('Patients not found');
			return redirect(route('patients.index'));
		}

		return view('patients.show')->with('patients', $patients);
	}

	/**
	 * Show the form for editing the specified Patients.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patients = Patients::find($id);

		if(empty($patients))
		{
			Flash::error('Patients not found');
			return redirect(route('patients.index'));
		}

		return view('patients.edit')->with('patients', $patients);
	}

	/**
	 * Update the specified Patients in storage.
	 *
	 * @param  int    $id
	 * @param CreatePatientsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePatientsRequest $request)
	{
		/** @var Patients $patients */
		$patients = Patients::find($id);

		if(empty($patients))
		{
			Flash::error('Patients not found');
			return redirect(route('patients.index'));
		}

		$patients->fill($request->all());
		$patients->save();

		Alert::success('Datos editados exitosamente!')->persistent("Cerrar");

		return redirect(route('patients.index'));
	}

	/**
	 * Remove the specified Patients from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Patients $patients */
		$patients = Patients::find($id);

		if(empty($patients))
		{
			Flash::error('Patients not found');
			return redirect(route('patients.index'));
		}

		$patients->delete();


		Alert::success('Paciente Borrado Exitosamente!')->persistent("Cerrar");

		return redirect(route('patients.index'));
	}

	public function consulations($id)
	{	
		$user = Auth::user();
		$doctor = $user->doctor;
		$fullname = $doctor->full_name;
		$patients = Patients::find($id);
		return view('consulations.create')
		->with('patients', $patients)
		->with('fullname', $fullname)
		->with('doctor', $doctor);
		
	}
}
