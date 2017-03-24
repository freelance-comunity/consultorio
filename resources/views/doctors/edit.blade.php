@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($doctor, ['route' => ['doctors.update', $doctor->id], 'method' => 'patch']) !!}

        @include('doctors.fields')

    {!! Form::close() !!}
</div>
@endsection