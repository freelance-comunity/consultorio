<!--- Name Patients Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_patients', 'Name Patients:') !!}
    {!! Form::text('name_patients', null, ['class' => 'form-control']) !!}
</div>

<!--- Name Doctor Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_doctor', 'Name Doctor:') !!}
    {!! Form::text('name_doctor', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!--- Weight Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<!--- Temperature Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('temperature', 'Temperature:') !!}
    {!! Form::text('temperature', null, ['class' => 'form-control']) !!}
</div>

<!--- Treatment Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('treatment', 'Treatment:') !!}
    {!! Form::text('treatment', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
