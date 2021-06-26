<!-- Tie Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_razon_social', 'Razon Social:') !!}
    {!! Form::text('tie_razon_social', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Tie Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_nombre', 'Nombre Tienda:') !!}
    {!! Form::text('tie_nombre', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Tie Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_direccion', 'Direccion Tienda:') !!}
    {!! Form::text('tie_direccion', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Tie Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_telefono', 'Telefono Tienda:') !!}
    {!! Form::number('tie_telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Tie Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_correo', 'Correo Tienda:') !!}
    {!! Form::text('tie_correo', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Tie Pagina Web Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_pagina_web', 'Pagina Web:') !!}
    {!! Form::number('tie_pagina_web', null, ['class' => 'form-control']) !!}
</div>

<!-- Tie Ruc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_ruc', 'Ruc:') !!}
    {!! Form::number('tie_ruc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tiendas.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
