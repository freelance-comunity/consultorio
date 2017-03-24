@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'doctors.store']) !!}

        @include('doctors.fields')

    {!! Form::close() !!}
</div>
@endsection
