@extends('adminlte::layouts.app')

@section('title')
Pacientes
@endsection

@section('main-content')

@section('contentheader_title')
Todos los pacientes
@endsection

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Pacientes</h1>
        @role('admin')
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('patients.create') !!}">Agregar Nuevo</a>
        @endrole
    </div>

    <div class="row">
        @if($patients->isEmpty())
        <div class="well text-center">No hay pacientes dados de alta.</div>
        @else
        <div class="table-responsive">
            <table class="table" id="users">
                <thead>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Edad</th>
                    <th>dirección</th>
                    
                    <th width="50px">Acción</th>
                   @role('admin')
                    <th>Consulta</th>
                    @endrole
                    
                </thead>
                <tbody>
                 
                    @foreach($patients as $patients)
                    <tr>
                        <td>{!! $patients->name !!}</td>
                        <td>{!! $patients->last_name !!}</td>
                        <td>{!! $patients->phone !!}</td>
                        <td>{!! $patients->age !!}</td>
                        <td>{!! $patients->address !!}</td>
                        @role('admin')
                        <td>
                            <a href="{!! route('patients.edit', [$patients->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('patients.delete', [$patients->id]) !!}" onclick="return confirm('¿Estas seguro de eliminar a este paciente?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </td> 
                        @endrole
                        <td>
                            @role('admin') <a href="{!! route('patients.generate', [$patients->id]) !!}" class="uppercase btn-block btn btn-primary">Agregar consulta</a>@endrole('admin')
                           <a href="{{ url('/viewconsulations') }}/{{ $patients->id }}" class=" uppercase btn-block btn btn-success">Ver consultas</a> 
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