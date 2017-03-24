@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($patients, ['route' => ['patients.update', $patients->id], 'method' => 'patch']) !!}

        @include('patients.fields')

    {!! Form::close() !!}
</div>
@endsection
