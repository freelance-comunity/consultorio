@extends('adminlte::layouts.app')
@section('title')
Crear Enfermero(a)
@endsection

@section('main-content')
@section('contentheader_title')
Crear Enfermero(a)
@endsection
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'nurses.store']) !!}

        @include('nurses.fields')

    {!! Form::close() !!}
</div>
@endsection
