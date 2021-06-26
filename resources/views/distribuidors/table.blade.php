<div class="table-responsive-sm">
    <table class="table table-striped" id="distribuidors-table">
        <thead>
            <tr>
                <th>Tienda</th>
        <th>Nombre Distribuidor</th>
        <th>Direccion Distribuidor</th>
        <th>Correo Distribuidor</th>
        <th>Telefono Distribuidor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($distribuidors as $distribuidor)
            <tr>
                <td>{{ $distribuidor->tie_id }}</td>
            <td>{{ $distribuidor->dis_nombre }}</td>
            <td>{{ $distribuidor->dis_direccion }}</td>
            <td>{{ $distribuidor->dis_correo }}</td>
            <td>{{ $distribuidor->dis_telefono }}</td>
                <td>
                    {!! Form::open(['route' => ['distribuidors.destroy', $distribuidor->dis_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('distribuidors.show', [$distribuidor->dis_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('distribuidors.edit', [$distribuidor->dis_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>