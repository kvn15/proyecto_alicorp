<div class="menu-left">
    <div class="title-menu">
        <span>Menú</span>
    </div>
    <section class="body-menu">
        <ul class="lista-menu">
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.overview', $id) }}" class="link-menu {{ request()->routeIs('*.show.overview') ? 'active' : '' }}">
                    Overview
                </a>
            </li>
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.indicadores', $id) }}" class="link-menu {{ request()->routeIs('*.show.indicadores') ? 'active' : '' }}">
                    Indicadores
                </a>
            </li>
            @if ($ruta == 'juego_campana')
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.asignacion', $id) }}" class="link-menu {{ request()->routeIs('*.show.asignacion') ? 'active' : '' }}">
                    Asignanciones
                </a>
            </li>
            @endif
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.participantes', $id) }}" class="link-menu {{ request()->routeIs('*.show.participantes') ? 'active' : '' }}">
                    Participantes
                </a>
            </li>
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.ganadores', $id) }}" class="link-menu {{ request()->routeIs('*.show.ganadores') ? 'active' : '' }}">
                    Ganadores
                </a>
            </li>
            <li class="item-menu">
                <a href="{{ route($ruta.'.show.configuracion', $id) }}" class="link-menu {{ request()->routeIs('*.show.configuracion') ? 'active' : '' }}">
                    Configuración
                </a>
            </li>
        </ul>
    </section>
</div>