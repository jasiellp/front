@if (!Auth::user()->escola)


@endif

<li class="nav-item {{ Request::is('usuarios*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('usuarios.index') !!}"><i class="nav-icon icon-cursor"></i><span>Usuários</span></a>
</li>

<li class="nav-item {{ Request::is('buffets*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('buffets.index') !!}"><i class="nav-icon icon-cursor"></i><span>Buffets</span></a>
</li>
<li class="nav-item {{ Request::is('pratos*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('pratos.index') !!}"><i class="nav-icon icon-cursor"></i><span>Pratos</span></a>
</li>
<li class="nav-item {{ Request::is('formasPagamentos*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('formasPagamentos.index') !!}"><i class="nav-icon icon-cursor"></i><span>Formas Pagamentos</span></a>
</li>
<li class="nav-item {{ Request::is('estabelecimentos*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('estabelecimentos.index') !!}"><i class="nav-icon icon-cursor"></i><span>Estabelecimento</span></a>
</li>
<li class="nav-item {{ Request::is('embalagems*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('embalagems.index') !!}"><i class="nav-icon icon-cursor"></i><span>Embalagens</span></a>
</li>
<li class="nav-item {{ Request::is('items*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('items.index') !!}"><i class="nav-icon icon-cursor"></i><span>Itens</span></a>
</li>
<!-- <li class="nav-item {{ Request::is('usuarios*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('usuarios.index') !!}"><i class="nav-icon icon-cursor"></i><span>Usuarios</span></a>
</li> -->
<li class="nav-item {{ Request::is('enderecos*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('enderecos.index') !!}"><i class="nav-icon icon-cursor"></i><span>Endereços</span></a>
</li>
<li class="nav-item {{ Request::is('comandas*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('comandas.index') !!}"><i class="nav-icon icon-cursor"></i><span>Comandas</span></a>
</li>
<li class="nav-item {{ Request::is('pedidos*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('pedidos.index') !!}"><i class="nav-icon icon-cursor"></i><span>Pedidos</span></a>
</li>
