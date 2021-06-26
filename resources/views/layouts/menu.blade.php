
        @if(Auth::user()->per_tipo=='A')
        
<li class="nav-item {{ Request::is('tiendas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tiendas.index') }}">
        <i class="nav-icon icon-handbag"></i>
        <span>Tiendas</span>
    </a>
</li>
<li class="nav-item {{ Request::is('distribuidors*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('distribuidors.index') }}">
        <i class="nav-icon icon-user"></i>
        <span>Distribuidor</span>
    </a>
</li>
<li class="nav-item {{ Request::is('tipoProductos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tipoProductos.index') }}">
        <i class="nav-icon icon-briefcase"></i>
        <span>Tipos Productos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('productos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('productos.index') }}">
        <i class="nav-icon icon-basket"></i>
        <span>Productos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('inventarios*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('inventarios.index') }}">
        <i class="nav-icon icon-book-open"></i>
        <span>Inventarios</span>
    </a>
</li>
<li class="nav-item {{ Request::is('facturas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('facturas.index') }}">
        <i class="nav-icon icon-envelope-letter"></i>
        <span>Facturas</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('persona.index') }}">
        <i class="nav-icon icon-people"></i>
        <span>Personas</span>
    </a>
</li>
@endif
    @if(Auth::user()->per_tipo=='U')

<li class="nav-item {{ Request::is('tiendas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tiendas.index') }}">
        <i class="nav-icon icon-handbag"></i>
        <span>Tiendas</span>
    </a>
</li>
<li class="nav-item {{ Request::is('tipoProductos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tipoProductos.index') }}">
        <i class="nav-icon icon-briefcase"></i>
        <span>Tipos Productos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('productos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('productos.index') }}">
        <i class="nav-icon icon-basket"></i>
        <span>Productos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('facturas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('facturas.index') }}">
        <i class="nav-icon icon-envelope-letter"></i>
        <span>Facturas</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('persona.index') }}">
        <i class="nav-icon icon-people"></i>
        <span>Personas</span>
    </a>
</li>


        @endif
        @if(Auth::user()->per_tipo=='C')
        
        <li class="nav-item {{ Request::is('tiendas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tiendas.index') }}">
        <i class="nav-icon icon-handbag"></i>
        <span>Tiendas</span>
    </a>
</li>
<li class="nav-item {{ Request::is('tipoProductos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tipoProductos.index') }}">
        <i class="nav-icon icon-briefcase"></i>
        <span>Tipos Productos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('productos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('productos.index') }}">
        <i class="nav-icon icon-basket"></i>
        <span>Productos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('facturas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('facturas.index') }}">
        <i class="nav-icon icon-envelope-letter"></i>
        <span>Facturas</span>
    </a>
</li>

        @endif