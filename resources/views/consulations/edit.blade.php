@extends('adminlte::layouts.app')
@section('title')
Editar Consulta
@endsection
@section('main-content')
@section('contentheader_title')
Editar consulta
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::model($consulation, ['route' => ['consulations.update', $consulation->id], 'method' => 'patch']) !!}

        @include('consulations.fields')

    {!! Form::close() !!}
</div>
@endsection
