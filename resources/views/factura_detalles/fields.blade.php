<!-- Fac Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fac_id', 'Fac Id:') !!}
    {!! Form::number('fac_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Facd Detalle Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facd_detalle_producto', 'Facd Detalle Producto:') !!}
    {!! Form::text('facd_detalle_producto', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Facd Valor Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facd_valor_producto', 'Facd Valor Producto:') !!}
    {!! Form::text('facd_valor_producto', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Facd Descuento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facd_descuento', 'Facd Descuento:') !!}
    {!! Form::text('facd_descuento', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Facd Valor Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facd_valor_total', 'Facd Valor Total:') !!}
    {!! Form::text('facd_valor_total', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('facturaDetalles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
