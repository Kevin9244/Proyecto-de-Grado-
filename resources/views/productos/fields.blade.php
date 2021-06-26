<!-- Tpro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tpro_id', 'Tipo Producto:') !!}
    {!! Form::select('tpro_id',$tipoproducto,null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_codigo', 'Codigo:') !!}
    {!! Form::number('pro_codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_descripcion', 'Descripcion:') !!}
    {!! Form::text('pro_descripcion', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Pro Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_marca', 'Marca:') !!}
    {!! Form::text('pro_marca', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Pro Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_modelo', 'Modelo:') !!}
    {!! Form::text('pro_modelo', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Pro Material Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_material', 'Material:') !!}
    {!! Form::text('pro_material', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Pro Medida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_medida', 'Medida:') !!}
    {!! Form::number('pro_medida', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Capacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_capacidad', 'Capacidad:') !!}
    {!! Form::number('pro_capacidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Unidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_unidad', 'Unidad:') !!}
    {!! Form::number('pro_unidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Nivel Proteccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_nivel_proteccion', 'Nivel Proteccion:') !!}
    {!! Form::number('pro_nivel_proteccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
