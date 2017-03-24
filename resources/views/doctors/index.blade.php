@extends('adminlte::layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Doctors</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('doctors.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($doctors->isEmpty())
        <div class="well text-center">No Doctors found.</div>
        @else
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Cedula</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>
               
                @foreach($doctors as $doctor)
                <tr>
                    <td>{!! $doctor->name !!}</td>
                    <td>{!! $doctor->last_name !!}</td>
                    <td>{!! $doctor->phone !!}</td>
                    <td>{!! $doctor->cedula !!}</td>
                    <td>
                        <a href="{!! route('doctors.edit', [$doctor->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('doctors.delete', [$doctor->id]) !!}" onclick="return confirm('Are you sure wants to delete this Doctor?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection