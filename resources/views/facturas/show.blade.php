
<img src="{{asset('img/logotipo.jpg')}}" style="width: 150px;">
<h1>{{$facturas->tie_razon_social}}</h1>
<strong>Direccion: {{$facturas->tie_direccion}}</strong><br>
<strong>Telefono: {{$facturas->tie_telefono}}</strong><br>
<div style="margin-left: 400px;">
<div style="background: #037DD3;color: white;margin-top: 10px;width: 300px;">
    <strong>Factura Nº</strong>
    <strong style="margin-left: 100px;">Fecha</strong>
</div>

<div style="margin-top: 10px;width: 300px;">
    <strong>0000{{$facturas->fac_numero_facturas}}</strong>
    <strong style="margin-left: 100px;">{{$facturas->fac_fecha}}</strong>
</div>
</div>
<div>

    <div>
        <div style="background: #037DD3;color: white;margin-top: 10px;width: 300px;text-align: center;">
    <strong>Facturar A</strong>
</div>

<div style="margin-top: 10px;width: 300px;">
    <strong>Nombre:</strong>
    <strong>{{$facturas->per_apellidos.' '.$facturas->per_nombres}}</strong>
</div>

<div style="margin-top: 10px;width: 300px;">
    <strong>Cédula:</strong>
    <strong>{{$facturas->per_cedula}}</strong>
</div>

<div style="margin-top: 10px;width: 300px;">
    <strong>Dirección:</strong>
    <strong>{{$facturas->per_direccion}}</strong>
</div>

<div style="margin-top: 10px;width: 300px;">
    <strong>Teléfono:</strong>
    <strong>{{$facturas->per_telefono}}</strong>
</div>
        
    </div>
    <table style="margin-top: 20px;width: 100%;">
        <tr style="background: #037DD3;color: white;">
            <th>#</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Valor U</th>
            <th>Valor T</th>
        </tr>
            <?php $subt=0; $total=0; ?>
        @foreach($detalle as $dt)
        <?php $subt=$subt+($dt->facd_vu*$dt->facd_cant) ?>

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dt->facd_cant}}</td>
            <td>{{$dt->pro_descripcion}}</td>
            <td style="text-align: right;">{{number_format($dt->facd_vu,2)}}$</td>
            <td style="text-align: right;">{{number_format($dt->facd_vu*$dt->facd_cant,2)}}$</td>
            
            
        </tr>
        @endforeach


   <?php
$fac_descuento=$facturas->fac_descuento;
$iva=($subt-$fac_descuento)*0.12;
$total=($subt-$fac_descuento+$iva);
?>

<tfoot>
   <tr>
       <th colspan="3"></th>
       <th style="text-align: right;">Subtotal</th>
       <th style="text-align: right;" id="subtotal">{{number_format($subt,2) }}$</th>
   </tr> 
   <tr>
       <th colspan="3"></th>
       <th style="text-align: right;">Descuento</th>
       <th style="text-align: right;">
         {{number_format($fac_descuento,2) }}$  
       </th>


   </tr>
   <tr>
       <th colspan="3"></th>
       <th style="text-align: right;">Iva
       </th>
       <th style="text-align: right;" id="iva_valor" name="iva_valor">{{number_format($iva,2) }}$</th>
   </tr>
   <tr>
       <th colspan="3"></th>
       <th style="text-align: right;">Total</th>
       <th style="text-align: right;" id="total">{{number_format($total,2) }}</th>
   </tr>

</tfoot>
</table>

