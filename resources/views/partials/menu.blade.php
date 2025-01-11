<nav class="menu-lateral">
    <h4 class="menu-title">
        <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Sistema de Gestão</a>
    </h4>
    <ul class="nav flex-column px-3">
        <li class="nav-item position-relative">
            <a href="#" class="nav-link text-white toggle-submenu">
                <i class="bi bi-people-fill me-2"></i> Gestão de Clientes
            </a>
            <ul class="submenu">
                <li>
                    <a href="{{ route('clientes.create') }}" class="nav-link text-white">Cadastrar Cliente</a>
                </li>
                <li>
                    <a href="{{ route('clientes.list') }}" class="nav-link text-white">Listar Clientes</a>
                </li>
            </ul>
        </li>

        <li class="nav-item position-relative">
            <a href="#" class="nav-link text-white toggle-submenu">
                <i class="bi bi-house me-2"></i> Gestão de Casas
            </a>
            <ul class="submenu">
                <li>
                    <a href="{{ route('casas.create') }}" class="nav-link text-white">Cadastrar Casa</a>
                </li>
                <li>
                    <a href="{{ route('casas.list') }}" class="nav-link text-white">Listar Casas</a>
                </li>
            </ul>
        </li>

        <li class="nav-item position-relative">
            <a href="#" class="nav-link text-white toggle-submenu">
                <i class="bi bi-building me-2"></i> Gestão de Apartamentos
            </a>
            <ul class="submenu">
                <li>
                    <a href="{{ route('apartamentos.create') }}" class="nav-link text-white">Cadastrar Apartamento</a>
                </li>
                <li>
                    <a href="{{ route('apartamentos.list') }}" class="nav-link text-white">Listar Apartamentos</a>
                </li>
            </ul>
        </li>

        <li class="nav-item position-relative">
            <a href="#" class="nav-link text-white toggle-submenu">
                <i class="bi bi-map me-2"></i> Gestão de Loteamentos
            </a>
            <ul class="submenu">
                <li>
                    <a href="{{ route('lotes.create') }}" class="nav-link text-white">Cadastrar Lotes</a>
                </li>
                <li>
                    <a href="{{ route('lotes.list') }}" class="nav-link text-white">Listar Loteamentos</a>
                </li>
            </ul>
        </li>

        <li class="nav-item position-relative">
            <a href="#" class="nav-link text-white toggle-submenu">
                <i class="bi bi-file-earmark-text me-2"></i> Gestão de Vendas
            </a>
            <ul class="submenu">
                <li>
                    <a href="{{ route('vendas.create') }}" class="nav-link text-white">Registrar Venda</a>
                </li>
                <li>
                    <a href="{{ route('vendas.list') }}" class="nav-link text-white">Listar Vendas</a>
                </li>
            </ul>
        </li>

        <li class="nav-item mt-4">
            <form action="{{ route('logout') }}" method="POST" class="d-flex">
                @csrf
                <button type="submit" class="nav-link text-white border-0 bg-transparent d-flex align-items-center">
                    <i class="bi bi-box-arrow-right me-2"></i> Sair
                </button>
            </form>
        </li>
    </ul>
</nav>
