@extends('adminlte::layouts.app')
@section('title')
Editar Medico
@endsection
@section('main-content')
@section('contentheader_title')
Editar medico
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($doctor, ['route' => ['doctors.update', $doctor->id], 'method' => 'patch']) !!}

        @include('doctors.fields')

    {!! Form::close() !!}
</div>
@endsection
