<div class="table-responsive-sm">
    <table class="table table-striped" id="facturas-table">
        <thead>
            <tr>
        <th>#</th>
        <th>Establecimiento</th>
        <th>Cliente</th>
        <th>Producto</th>
        <th>Numero Facturas</th>
        <th>Fecha Registro</th>
        <th>Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $gtotal=0; ?>
        @foreach($facturas as $factura)
        <?php
        if($factura->fac_iva==0){
            $total=($factura->subt-$factura->fac_descuento);
        }else{
            $iva=($factura->subt-$factura->fac_descuento)*0.12;
            $total=($factura->subt-$factura->fac_descuento)+$iva;

        }
        $gtotal=$gtotal+$total;
        ?>
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $factura->tie_razon_social }}</td>
            <td>{{ $factura->per_apellidos.' '.$factura->per_nombres }}</td>
            <td>{{ $factura->pro_descripcion }}</td>
            <td>00000{{ $factura->fac_numero_facturas }}</td>
            <td>{{ $factura->fac_fecha }}</td>
            <td class="text-right">{{ number_format($total,2) }}$</td>

                <td>
                    {!! Form::open(['route' => ['facturas.destroy', $factura->fac_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('facturas.show', [$factura->fac_id]) }}" target="_blank" class='btn btn-ghost-danger'><i class="fa fa-file-pdf-o"></i></a>
                        <a href="{{ route('facturas.edit', [$factura->fac_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tr>
            <th colspan="6" class="text-right">Total</th>
            <th class="text-right">{{number_format($gtotal,2)}}$</th>
        </tr>
    </table>
</div>