@extends('adminlte::layouts.app')

@section('title')
Crear Paciente
@endsection

@section('main-content')
@section('contentheader_title')
Crear paciente
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'patients.store']) !!}

        @include('patients.fields')

    {!! Form::close() !!}
</div>
@endsection
