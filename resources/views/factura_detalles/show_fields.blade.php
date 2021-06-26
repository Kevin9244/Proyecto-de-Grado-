<!-- Fac Id Field -->
<div class="form-group">
    {!! Form::label('fac_id', 'Fac Id:') !!}
    <p>{{ $facturaDetalle->fac_id }}</p>
</div>

<!-- Facd Detalle Producto Field -->
<div class="form-group">
    {!! Form::label('facd_detalle_producto', 'Facd Detalle Producto:') !!}
    <p>{{ $facturaDetalle->facd_detalle_producto }}</p>
</div>

<!-- Facd Valor Producto Field -->
<div class="form-group">
    {!! Form::label('facd_valor_producto', 'Facd Valor Producto:') !!}
    <p>{{ $facturaDetalle->facd_valor_producto }}</p>
</div>

<!-- Facd Descuento Field -->
<div class="form-group">
    {!! Form::label('facd_descuento', 'Facd Descuento:') !!}
    <p>{{ $facturaDetalle->facd_descuento }}</p>
</div>

<!-- Facd Valor Total Field -->
<div class="form-group">
    {!! Form::label('facd_valor_total', 'Facd Valor Total:') !!}
    <p>{{ $facturaDetalle->facd_valor_total }}</p>
</div>

