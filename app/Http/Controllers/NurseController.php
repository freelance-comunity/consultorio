<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateNurseRequest;
use App\Models\Nurse;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Hash;
use Alert;
use App\User;
use App\Role;

class NurseController extends AppBaseController
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
		$query = Nurse::query();
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

        $nurses = $query->get();

        return view('nurses.index')
            ->with('nurses', $nurses)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Nurse.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('nurses.create');
	}

	/**
	 * Store a newly created Nurse in storage.
	 *
	 * @param CreateNurseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateNurseRequest $request)
	{
        $input = $request->all();

        /*Create User*/
		$name = $request->input('name');
		$email = $request->input('email');
       
		$datos['name'] = $name;
		$datos['email'] = $email;
		$datos['password'] = Hash::make($request->input('password'));

		/*Crear usuario de Nurse*/
		$usuario = User::create($datos);
		$id = $usuario->id;
		$user = User::find($id);
		$nurse = Role::find(2); /*Aquí es 2 ya que el rol enfermera es el numero 2 en la tabla roles*/
		$user->attachRole($nurse);
		$input['user_id'] = $id;
		$input['password'] = Hash::make($request->input('password'));

		$nurse = Nurse::create($input);

		Alert::success('Enfermera dada de alta exitosamente!')->persistent("Cerrar");

		return redirect(route('nurses.index'));
	}

	/**
	 * Display the specified Nurse.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$nurse = Nurse::find($id);

		if(empty($nurse))
		{
			Flash::error('Nurse not found');
			return redirect(route('nurses.index'));
		}

		return view('nurses.show')->with('nurse', $nurse);
	}

	/**
	 * Show the form for editing the specified Nurse.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$nurse = Nurse::find($id);

		if(empty($nurse))
		{
			Flash::error('Nurse not found');
			return redirect(route('nurses.index'));
		}

		return view('nurses.edit')->with('nurse', $nurse);
	}

	/**
	 * Update the specified Nurse in storage.
	 *
	 * @param  int    $id
	 * @param CreateNurseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateNurseRequest $request)
	{
		/** @var Nurse $nurse */
		$nurse = Nurse::find($id);

		if(empty($nurse))
		{
			Flash::error('Nurse not found');
			return redirect(route('nurses.index'));
		}

		$nurse->fill($request->all());
		$nurse->save();

		Alert::success('Datos editados exitosamente!')->persistent("Cerrar");

		return redirect(route('nurses.index'));
	}

	/**
	 * Remove the specified Nurse from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Nurse $nurse */
		$nurse = Nurse::find($id);

		if(empty($nurse))
		{
			Flash::error('Nurse not found');
			return redirect(route('nurses.index'));
		}

		$nurse->delete();

		Alert::success('Doctor Borrado Exitosamente!')->persistent("Cerrar");

		return redirect(route('nurses.index'));
	}
}
