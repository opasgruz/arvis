
<div class="navbar-left pull-right">
    <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown">
            <a href="#" class="filials-dropdown-toggle" data-toggle="dropdown">
                <div class="header-filials-menu" id="current-filial">
                    {{\App\Helpers\AppHelper::GetUserCurrentFilialName()}}
                </div>
            </a>
            <ul class="dropdown-menu filials-menu">
                @foreach (\App\Helpers\AppHelper::getFilials() as $filial_key => $filial_name)
                    <li><a class="select-filial @if ($filial_key ==  \App\Helpers\AppHelper::GetUserCurrentFilialId()) active @endif" href="javascript:void(0)" data-filial_id = {{ $filial_key }}>{{$filial_name}}</a></li>
                @endforeach
            </ul>

        </li>
    </ul>
</div>

