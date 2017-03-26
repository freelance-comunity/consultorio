<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateConsulationRequest;
use App\Models\Consulation;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;

class ConsulationController extends AppBaseController
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
		$query = Consulation::query();
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

        $consulations = $query->get();

        return view('consulations.index')
            ->with('consulations', $consulations)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Consulation.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('consulations.create');
	}

	/**
	 * Store a newly created Consulation in storage.
	 *
	 * @param CreateConsulationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateConsulationRequest $request)
	{
        $input = $request->all();

		$consulation = Consulation::create($input);

		Alert::success('Consulta Generada Exitosamente!')->persistent("Cerrar");

		return redirect(route('consulations.index'));
	}

	/**
	 * Display the specified Consulation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$consulation = Consulation::find($id);

		if(empty($consulation))
		{
			Flash::error('Consulation not found');
			return redirect(route('consulations.index'));
		}

		return view('consulations.show')->with('consulation', $consulation);
	}

	/**
	 * Show the form for editing the specified Consulation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$consulation = Consulation::find($id);

		if(empty($consulation))
		{
			Flash::error('Consulation not found');
			return redirect(route('consulations.index'));
		}

		return view('consulations.edit')->with('consulation', $consulation);
	}

	/**
	 * Update the specified Consulation in storage.
	 *
	 * @param  int    $id
	 * @param CreateConsulationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateConsulationRequest $request)
	{
		/** @var Consulation $consulation */
		$consulation = Consulation::find($id);

		if(empty($consulation))
		{
			Flash::error('Consulation not found');
			return redirect(route('consulations.index'));
		}

		$consulation->fill($request->all());
		$consulation->save();

		Alert::success('Datos editados exitosamente!')->persistent("Cerrar");

		return redirect(route('consulations.index'));
	}

	/**
	 * Remove the specified Consulation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Consulation $consulation */
		$consulation = Consulation::find($id);

		if(empty($consulation))
		{
			Flash::error('Consulation not found');
			return redirect(route('consulations.index'));
		}

		$consulation->delete();

		Alert::success('Consulta Borrada Exitosamente!')->persistent("Cerrar");

		return redirect(route('consulations.index'));
	}
}
