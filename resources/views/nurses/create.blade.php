@extends('adminlte::layouts.app')
@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'nurses.store']) !!}

        @include('nurses.fields')

    {!! Form::close() !!}
</div>
@endsection
