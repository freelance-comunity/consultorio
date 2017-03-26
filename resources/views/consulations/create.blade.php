@extends('adminlte::layouts.app')
@section('title')
Crear consulta
@endsection
@section('main-content')
@section('contentheader_title')
Crear consulta
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'consulations.store']) !!}

        @include('consulations.fields')

    {!! Form::close() !!}
</div>
@endsection
