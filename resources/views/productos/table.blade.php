<div class="table-responsive-sm">
    <table class="table table-striped" id="productos-table">
        <thead>
            <tr>
                <th>Tipo Producto</th>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>PMaterial</th>
        <th>Medida</th>
        <th>Capacidad</th>
        <th>Unidad</th>
        <th>Nivel Proteccion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->tpro_id }}</td>
            <td>{{ $producto->pro_codigo }}</td>
            <td>{{ $producto->pro_descripcion }}</td>
            <td>{{ $producto->pro_marca }}</td>
            <td>{{ $producto->pro_modelo }}</td>
            <td>{{ $producto->pro_material }}</td>
            <td>{{ $producto->pro_medida }}</td>
            <td>{{ $producto->pro_capacidad }}</td>
            <td>{{ $producto->pro_unidad }}</td>
            <td>{{ $producto->pro_nivel_proteccion }}</td>
                <td>
                    {!! Form::open(['route' => ['productos.destroy', $producto->pro_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productos.show', [$producto->pro_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('productos.edit', [$producto->pro_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>