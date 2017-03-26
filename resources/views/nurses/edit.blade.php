@extends('adminlte::layouts.app')
@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($nurse, ['route' => ['nurses.update', $nurse->id], 'method' => 'patch']) !!}

        @include('nurses.fields')

    {!! Form::close() !!}
</div>
@endsection
