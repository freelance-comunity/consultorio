@extends('adminlte::layouts.app')
@section('title')
Editar Enfermero(a)
@endsection

@section('main-content')
@section('contentheader_title')
Editar Enfermero(a)
@endsection<div class="container">

    @include('common.errors')

    {!! Form::model($nurse, ['route' => ['nurses.update', $nurse->id], 'method' => 'patch']) !!}

        @include('nurses.fields')

    {!! Form::close() !!}
</div>
@endsection
