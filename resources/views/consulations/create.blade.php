@extends('adminlte::layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'consulations.store']) !!}

        @include('consulations.fields')

    {!! Form::close() !!}
</div>
@endsection
