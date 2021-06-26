<!-- Pro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_id', 'Producto:') !!}
    {!! Form::select('pro_id',$producto,null, ['class' => 'form-control']) !!}
</div>

<!-- Tie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tie_id', 'Tienda:') !!}
    {!! Form::select('tie_id',$tienda, null, ['class' => 'form-control']) !!}
</div>

<!-- Inv Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inv_fecha', 'Fecha:') !!}
    {!! Form::text('inv_fecha', null, ['class' => 'form-control','id'=>'inv_fecha']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#inv_fecha').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Inv Hora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inv_hora', 'Hora:') !!}
    {!! Form::text('inv_hora', null, ['class' => 'form-control']) !!}
</div>

<!-- Inv Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inv_cantidad', 'Cantidad:') !!}
    {!! Form::number('inv_cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Inv Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inv_documento', 'Documento:') !!}
    {!! Form::number('inv_documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Inv Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inv_serie', 'Serie:') !!}
    {!! Form::number('inv_serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('inventarios.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
