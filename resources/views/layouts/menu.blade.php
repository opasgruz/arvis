<li class="nav-item {{ Request::is('filials*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('filials.index') }}">
        <i class="nav-icon icon-globe"></i>
        <span>Филиалы</span>
    </a>
</li>
<li class="nav-item {{ Request::is('positions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('positions.index') }}">
        <i class="nav-icon icon-badge"></i>
        <span>Должности</span>
    </a>
</li>
<li class="nav-item {{ Request::is('workers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('workers.index') }}">
        <i class="nav-icon icon-people"></i>
        <span>Сотрудники</span>
    </a>
</li>
