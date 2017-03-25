@extends('adminlte::layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Medicos dados de Alta</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('doctors.create') !!}">Agregar Nuevo</a>
    </div>

    <div class="row">
        @if($doctors->isEmpty())
        <div class="well text-center">No hay ningun registro hasta el momento.</div>
        @else
        <table class="table" id="users">
            <thead>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Cedula</th>
                <th>Email</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>
               
                @foreach($doctors as $doctor)
                <tr>
                    <td>{!! $doctor->name !!}</td>
                    <td>{!! $doctor->last_name !!}</td>
                    <td>{!! $doctor->phone !!}</td>
                    <td>{!! $doctor->professional_id !!}</td>
                    <td>{!! $doctor->email !!}</td>
                    <td>
                        <a href="{!! route('doctors.edit', [$doctor->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('doctors.delete', [$doctor->id]) !!}" onclick="return confirm('¿Estas seguro de borrar a este Medico?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection