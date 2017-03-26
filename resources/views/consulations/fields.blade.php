<!--- Name Patients Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_patients', 'Nombre del Paciente:') !!}
    {!! Form::text('name_patients', null, ['class' => 'form-control']) !!}
</div>

<!--- Name Doctor Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_doctor', 'Nombre del Doctor:') !!}
    {!! Form::text('name_doctor', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!--- Weight Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('weight', 'Peso:') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<!--- Temperature Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('temperature', 'Temperatura:') !!}
    {!! Form::text('temperature', null, ['class' => 'form-control']) !!}
</div>

<!--- Treatment Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('treatment', 'Tratamiento:') !!}
    {!! Form::text('treatment', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
