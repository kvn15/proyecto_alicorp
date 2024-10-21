@php
    // $id = HomeInicio::user()->id;
    // $adminData = App\Models\User::find($id);
    $adminData = App\Models\AdminPanel::find(1);
    //@dd($adminData)
@endphp

<aside class="app-sidebar bg-nav-alicorp shadow" data-bs-theme="dark"> 
    <div class="sidebar-brand"> 
        <a href="../index.html" class="brand-link">
            <img src="{{ !empty($adminData->profile_image) ? url('img/upload/admin_images/' . $adminData->profile_image) : url('img/upload/no_image.jpg') }}" alt="" class="brand-image">
            <span class="brand-text fw-light">
                <b>{{ $adminData->name }}</b>  <br>
                <span>ADMINISTRADOR</span><br>
                <span>{{ $adminData->email }}</span>
            </span> 
        </a> 
    </div>
    <hr>
    <div class="sidebar-wrapper">
        <nav class="mt-2"> 
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
               
                <li class="nav-item"> 
                    <a href="#" class="nav-link {{ request()->routeIs('adminPanel.dashboard') || request()->routeIs('adminPanel.*.*') ? 'active' : '' }}"> 
                        <i class='nav-icon bx bx-home-alt'></i>
                        <p>Inicio
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('adminPanel.dashboard') }}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>Sliders</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{route('adminPanel.inicio.sec_promo')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>promociones</p>
                            </a> </li>
                    </ul>           
                </li>
                  
                <li class="nav-item"> 
                    <a href="#" class="nav-link {{ request()->routeIs('landing_promocional.*') || request()->routeIs('landing_promocional.*.*') ? 'active' : '' }}"> 
                        <i class="nav-icon bi bi-window"></i>
                        <p>
                            Calendario
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a> 
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('adminPanel.calendario.slider') }}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                            <p>Sliders</p>
                        </a> </li>
                    <li class="nav-item"> <a href="{{route('adminPanel.calendario.cards')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                            <p>Cards Promociones </p>
                        </a> </li>
                    </ul>
                </li>
                
                <li class="nav-item"> 
                    <a href="#" class="nav-link {{ request()->routeIs('admin.dashboard.juegosWeb') || request()->routeIs('juego_web.*.*') ? 'active' : '' }}"> 
                        <i class="nav-icon bi bi-window"></i>
                        <p>Promociones
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a> 
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('adminPanel.promociones.slider') }}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                            <p>Sliders</p>
                        </a> </li>
                    <li class="nav-item"> <a href="{{route('adminPanel.promociones.cards')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                            <p>Cards Promociones</p>
                        </a> </li>
                    </ul>
                </li>
                {{-- <li class="nav-item"> 
                    <a href="{{ route('admin.dashboard.juegosCamp') }}" class="nav-link {{ request()->routeIs('admin.dashboard.juegosCamp') || request()->routeIs('juego_campana.*.*') ? 'active' : '' }}"> 
                        <i class="nav-icon bi bi-megaphone"></i>
                        <p>Juego Campaña</p>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a href="{{ route('dashboard.configuracion') }}" class="nav-link {{ request()->routeIs('dashboard.configuracion') ? 'active' : '' }}"> 
                        <i class='nav-icon bx bx-cog'></i>
                        <p>Configuración</p>
                    </a> 
                </li> --}}
            </ul>
        </nav>
        <nav class="mt-auto"> 
            <hr style="width: 100%">
            <ul class="nav sidebar-menu flex-column mt-2" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> 
                    <a href="" class="nav-link"> 
                        <i class='nav-icon bx bx-cog'></i>
                        <p>Configuración</p>
                    </a> 
                </li> 
                <li class="nav-item"> 
                    <a href="{{ route('adminPanel.logout') }}" class="nav-link"> 
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Cerrar Sesión</p>
                    </a> 
                </li>
            </ul>
        </nav>
    </div> 
</aside> 