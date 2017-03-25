@extends('adminlte::layouts.app')

@section('title')
Editar Paciente
@endsection

@section('main-content')
@section('contentheader_title')
Editar paciente
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($patients, ['route' => ['patients.update', $patients->id], 'method' => 'patch']) !!}

        @include('patients.fields')

    {!! Form::close() !!}
</div>
@endsection
