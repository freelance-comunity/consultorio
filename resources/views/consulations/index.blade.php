@extends('adminlte::layouts.app')
@section('title')
Consultas
@endsection

@section('main-content')
@section('contentheader_title')
Todas las consultas
@endsection
<div class="container">

    @include('sweet::alert')

   <!-- <div class="row">
        <h1 class="pull-left">Consultas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('consulations.create') !!}">Agregar Nuevo</a>
    </div>-->

    <div class="row">
        @if($consulations->isEmpty())
        <div class="well text-center">No se encontraron consultas.</div>
        @else
        <div class="table-responsive">
            <table class="table" id="users">
                <thead>
                    <th>Nombre del Paciente</th>
                    <th>Nombre del Medico</th>
                    <th>Fecha</th>
                    <th>Peso en kg</th>
                    <th>Temperatura</th>
                    <th>Tratamiento</th>
                    <th width="50px">Acción</th>
                </thead>
                <tbody>

                    @foreach($consulations as $consulation)
                    <tr>
                        <td>{!! $consulation->name_patients !!}</td>
                        <td>{!! $consulation->name_doctor !!}</td>
                        <td>{!! $consulation->date !!}</td>
                        <td>{!! $consulation->weight !!}</td>
                        <td>{!! $consulation->temperature !!}</td>
                        <td>{!! $consulation->treatment !!}</td>
                        <td>
                            <a href="{!! route('consulations.edit', [$consulation->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('consulations.delete', [$consulation->id]) !!}" onclick="return confirm('Are you sure wants to delete this Consulation?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection