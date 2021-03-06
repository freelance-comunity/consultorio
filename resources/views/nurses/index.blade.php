@extends('adminlte::layouts.app')

@section('title')
Enfermeros(a)
@endsection

@section('main-content')
@section('contentheader_title')
Todos los enfermeros y enfermeras
@endsection

    <div class="container">

        @include('sweet::alert')

        <div class="row">
            <h1 class="pull-left">Enfermeros(a) dados de alta</h1>
            @role('admin')
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('nurses.create') !!}">Agregar Nuevo</a>
            @endrole
        </div>

        <div class="row">
            @if($nurses->isEmpty())
                <div class="well text-center">No se encontraron enfermeros.</div>
            @else
            <div class="table-responsive">
                <table class="table" id="users">
                    <thead>
                    <th>Name</th>
        			<th>Last Name</th>
        			<th>Phone</th>
        			<th>Email</th>
                    @role('admin')			 
                    <th width="50px">Accción</th>
                    @endrole
                    </thead>
                    <tbody>
                     
                    @foreach($nurses as $nurse)
                        <tr>
                            <td>{!! $nurse->name !!}</td>
					<td>{!! $nurse->last_name !!}</td>
					<td>{!! $nurse->phone !!}</td>
					<td>{!! $nurse->email !!}</td>
					@role('admin')
                            <td>
                                <a href="{!! route('nurses.edit', [$nurse->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('nurses.delete', [$nurse->id]) !!}" onclick="return confirm('Are you sure wants to delete this Nurse?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                        @endrole
                    @endforeach
                    </tbody>
                </table>
                </div>
            @endif
        </div>
    </div>
@endsection