<!--- Name Patients Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_patients', 'Nombre del Paciente:') !!}
    {!! Form::text('name_patients', $patients->name." ".$patients->last_name, ['class' => 'form-control']) !!}
</div>

<!--- Name Doctor Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_doctor', 'Nombre del Medico:') !!}
    {!! Form::text('name_doctor', $doctor->name, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha:') !!}
    <input type="date" class="form-control datepicker" name="date">
</div>

<!--- Weight Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('weight', 'Peso:') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<!--- Temperature Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('temperature', 'Temperatura corporal:') !!}
    {!! Form::text('temperature', null, ['class' => 'form-control']) !!}
</div>

<!--- Treatment Field --->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('treatment', 'Tratamiento:') !!}
    {!! Form::textarea('treatment', null, ['class' => 'form-control ckeditor']) !!}
    <input type="hidden" value="{{ $patients->id }}" name="patients_id">
    <input type="hidden" value="{{ $doctor->id }}" name="doctors_id">
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Generar', ['class' => 'uppercase btn btn-primary']) !!}
</div>
