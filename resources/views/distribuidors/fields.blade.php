<!-- Tie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_id', 'Tienda:') !!}
    {!! Form::select('tie_id',$tienda,null, ['class' => 'form-control']) !!}
</div>

<!-- Dis Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dis_nombre', 'Nombre Distribuidor:') !!}
    {!! Form::text('dis_nombre', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Dis Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dis_direccion', 'Direccion Distribuidor:') !!}
    {!! Form::text('dis_direccion', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Dis Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dis_correo', 'Correo Distribuidor:') !!}
    {!! Form::text('dis_correo', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Dis Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dis_telefono', 'Telefono Distribuidor:') !!}
    {!! Form::number('dis_telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('distribuidors.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
