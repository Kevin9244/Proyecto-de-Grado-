<div class="table-responsive-sm">
    <table class="table table-striped" id="tipoProductos-table">
        <thead>
            <tr>
                <th>Distribuidor</th>
        <th>Descripcion Producto</th>
        <th>Estado Producto</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipoProductos as $tipoProducto)
            <tr>
                <td>{{ $tipoProducto->dis_id }}</td>
            <td>{{ $tipoProducto->tpro_descripcion }}</td>
            <td>{{ $tipoProducto->tpro_estado }}</td>
                <td>
                    {!! Form::open(['route' => ['tipoProductos.destroy', $tipoProducto->tpro_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipoProductos.show', [$tipoProducto->tpro_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('tipoProductos.edit', [$tipoProducto->tpro_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>