@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($consulation, ['route' => ['consulations.update', $consulation->id], 'method' => 'patch']) !!}

        @include('consulations.fields')

    {!! Form::close() !!}
</div>
@endsection
