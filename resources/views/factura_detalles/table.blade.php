<div class="table-responsive-sm">
    <table class="table table-striped" id="facturaDetalles-table">
        <thead>
            <tr>
                <th>Fac Id</th>
        <th>Facd Detalle Producto</th>
        <th>Facd Valor Producto</th>
        <th>Facd Descuento</th>
        <th>Facd Valor Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($facturaDetalles as $facturaDetalle)
            <tr>
                <td>{{ $facturaDetalle->fac_id }}</td>
            <td>{{ $facturaDetalle->facd_detalle_producto }}</td>
            <td>{{ $facturaDetalle->facd_valor_producto }}</td>
            <td>{{ $facturaDetalle->facd_descuento }}</td>
            <td>{{ $facturaDetalle->facd_valor_total }}</td>
                <td>
                    {!! Form::open(['route' => ['facturaDetalles.destroy', $facturaDetalle->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('facturaDetalles.show', [$facturaDetalle->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('facturaDetalles.edit', [$facturaDetalle->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>