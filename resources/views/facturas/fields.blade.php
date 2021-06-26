<?php 

if(isset($factura)){
    $descuento=$factura->fac_descuento;
    $iva=$factura->fac_iva;
    $fac_descuento=$factura->fac_descuento;
    $fac_iva=$factura->fac_iva;

}else{
    $descuento=0;
    $iva=0;
    $fac_descuento=0;
    $fac_iva=0;

}   

    ?>
<style>
.table{
    border-collapse:collapse;
}
    
</style>
@section('scripts')
<script>
    $(()=>{ ///funcion que indica que se cargo la pagina
        calculos();

    })

    $(document).on("input","#fac_descuento",function(){
        calculos();
    })
    $(document).on("click","#fac_iva",function(){
        calculos();
    })

    function calculos(){
        const descuento=$("#fac_descuento").val();
        const subt=$("#subtotal").html();

        let iva=0;
        if($("#fac_iva").prop('checked') ){
            iva=(subt-descuento)*0.12;

        }
        $("#iva_valor").html(iva.toFixed(2));        
        const total=(subt-descuento+iva);
        $("#total").html(total.toFixed(2));

    }
</script>
@endsection

<table border="0" width="80%">
    <tr>
        <th colspan="4" class="text-center bg-primary">DATOS PRINCIPALES</th>
    </tr>
    <tr>
        <td>Cliente</td>
        <td>{!! Form::select('per_id',$persona,null, ['class' => 'form-control']) !!}</td>
        <td>Tienda</td>
        <td>{!! Form::select('tie_id',$tienda,null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>Tipo Producto</td>
        <td> {!! Form::select('tpro_id',$tiproducto,null, ['class' => 'form-control']) !!}</td>
        <td>Factura Nº</td>
        <td>{!! Form::text('fac_numero_facturas',$facNo, ['class' => 'form-control']) !!}</td>
    </tr>
     <tr>
        <th colspan="4" class="text-center bg-primary">DETALLE DE LA FACTURA</th>
    </tr>
    <tr>
        <td>Cantidad</td>
        <td>Descripcion</td>
        <td>Valor U</td>
        <td style="width:200px; text-align: center;">Valor T</td>
    </tr>
    <tr>
        <td>
            {!! Form::number('facd_cant',null, ['class' => 'form-control','size'=>'4','pattern'=>'[0-9]+']) !!}
        </td>
        <td>
            {!! Form::select('pro_id',$producto,null, ['class' => 'form-control']) !!}
        </td>
        <td>
            {!! Form::number('facd_vu',null, ['class' => 'form-control','size'=>'4','pattern'=>'[0-9]+']) !!}
        </td>
        <td>
            <button class="btn btn-primary fa fa-plus btm-sm"></button>
        </td>
    </tr>
    <?php $subt=0; $total=0; ?>
    @isset($facturaDetalle)
        @forelse($facturaDetalle as $fd)
        <?php $subt=$subt+($fd->facd_vu*$fd->facd_cant) ?>
            <tr>
            <td>{{$fd->facd_cant}}</td>
            <td>{{$fd->pro_descripcion}}</td>
            <td align="right">{{number_format( $fd->facd_vu,2) }} $</td>
            <td align="right">{{number_format( ($fd->facd_vu*$fd->facd_cant),2) }}$</td>
            <td>
             
             <a href="{{route('facturaDetalles.destroy',$fd->facd_id)}}" class="btn btn-ghost-danger btn-sm"><i class="fa fa-trash"> </i></a>

            </td>
        </tr>
        @empty
        <tr><th colspan="4">No existen datos</th></tr>
        @endforelse
    @endisset
    <?php
        $total=($subt-$descuento+$iva);
    ?>
    

    <tfoot>
        <tr>
                <th colspan="2"></th>
                <th style="text-align: right;">SubTotal</th>
                <th style="text-align: right;" id="subtotal">{{number_format($subt,2) }}</th>
        </tr>
        <tr>
                <th colspan="2"></th>
                <th style="text-align: right;">Descuento
                </th>
                <th style="text-align: right;">
                    <input type="text" name="fac_descuento" id="fac_descuento" value="{{$fac_descuento}}">
                </th>
        </tr>
        <tr>
                <th colspan="2"></th>
                <th style="text-align: right;">IVA
                    @if($fac_iva==1)
                        <input type="checkbox" checked="true" name="fac_iva" id="fac_iva">
                    @else
                        <input type="checkbox" name="fac_iva" id="fac_iva">
                    @endif
                </th>
                <th style="text-align: right;" id="iva_valor">{{number_format($iva,2)}} </th>
        </tr>
        <tr>
                <th colspan="2"></th>
                <th style="text-align: right;">Total</th>
                <th style="text-align: right;" id="total">{{number_format($total,2) }}</th>
        </tr>
    </tfoot>
</table>
<div class="row">
    <button class="btn btn-primary">Finalizar</button>
</div>
    
