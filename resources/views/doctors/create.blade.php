@extends('adminlte::layouts.app')
@section('title')
Crear Medico
@endsection
@section('main-content')
@section('contentheader_title')
Crear medico
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'doctors.store']) !!}

        @include('doctors.fields')

    {!! Form::close() !!}
</div>
@endsection
