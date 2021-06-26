<div class="table-responsive-sm">
    <table class="table table-striped" id="tiendas-table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Razon Social</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Pagina Web</th>
        <th>Ruc</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $tienda->tie_razon_social }}</td>
            <td>{{ $tienda->tie_nombre }}</td>
            <td>{{ $tienda->tie_direccion }}</td>
            <td>{{ $tienda->tie_telefono }}</td>
            <td>{{ $tienda->tie_correo }}</td>
            <td>{{ $tienda->tie_pagina_web }}</td>
            <td>{{ $tienda->tie_ruc }}</td>
                <td>
                    {!! Form::open(['route' => ['tiendas.destroy', $tienda->tie_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tiendas.show', [$tienda->tie_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('tiendas.edit', [$tienda->tie_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>