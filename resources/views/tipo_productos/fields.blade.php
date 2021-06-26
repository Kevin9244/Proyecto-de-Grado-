<!-- Dis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dis_id', 'Distribuidor:') !!}
    {!! Form::select('dis_id',$distribuidor,null, ['class' => 'form-control']) !!}
</div>

<!-- Tpro Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tpro_descripcion', 'Descripcion Producto:') !!}
    {!! Form::text('tpro_descripcion', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Tpro Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tpro_estado', 'Estado Producto:') !!}
    {!! Form::text('tpro_estado', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tipoProductos.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
