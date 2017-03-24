@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'patients.store']) !!}

        @include('patients.fields')

    {!! Form::close() !!}
</div>
@endsection
