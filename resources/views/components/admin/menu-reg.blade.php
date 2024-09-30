<div class="menu-left">
    <div class="title-menu">
        <span>Menú</span>
    </div>
    <section class="body-menu">
        <ul class="lista-menu">
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.overview', 1) }}" class="link-menu {{ request()->routeIs('*.show.overview') ? 'active' : '' }}">
                    Overview
                </a>
            </li>
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.indicadores', 1) }}" class="link-menu {{ request()->routeIs('*.show.indicadores') ? 'active' : '' }}">
                    Indicadores
                </a>
            </li>
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.participantes', 1) }}" class="link-menu {{ request()->routeIs('*.show.participantes') ? 'active' : '' }}">
                    Participantes
                </a>
            </li>
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.ganadores', 1) }}" class="link-menu {{ request()->routeIs('*.show.ganadores') ? 'active' : '' }}">
                    Ganadores
                </a>
            </li>
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.configuracion', 1) }}" class="link-menu {{ request()->routeIs('*.show.configuracion') ? 'active' : '' }}">
                    Configuración
                </a>
            </li>
        </ul>
    </section>
</div>