@extends('adminlte::layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Patients</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('patients.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($patients->isEmpty())
        <div class="well text-center">No Patients found.</div>
        @else
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Address</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>
               
                @foreach($patients as $patients)
                <tr>
                    <td>{!! $patients->name !!}</td>
                    <td>{!! $patients->last_name !!}</td>
                    <td>{!! $patients->phone !!}</td>
                    <td>{!! $patients->age !!}</td>
                    <td>{!! $patients->address !!}</td>
                    <td>
                        <a href="{!! route('patients.edit', [$patients->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('patients.delete', [$patients->id]) !!}" onclick="return confirm('Are you sure wants to delete this Patients?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection