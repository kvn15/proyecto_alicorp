<div class="container-fluid">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('/img/logo_alicorop_f.png') }}" alt="" class="logo-main">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-center">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 c">
            <li class="nav-item me-3">
                <a class="nav-link" href="{{ route('promocion') }}">Promociones</a>
            </li>
            <li class="nav-item me-3 me-s">
                <a class="nav-link" href="{{ route('juegos') }}">Juegos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('nuevo') }}">Lo Nuevo</a>
            </li>
    </div>
    <div class="perfil d-flex align-items-center justify-content-between">
        <div class="a-perfil d-md-flex">
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="btn btn-primary" href="{{ route('logout') }} "
                    onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                    Salir
                </a>
            @endauth
            @guest
            <a class="btn btn-primary" href="{{ route('login') }}">Mi Perfil</a>
            @endguest
        </div>
        <div class="menuh me-3">
            <a id="openModalBtn">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span id="closeModalBtn" class="close">&times;</span>
            <div class="d-flex">
                <img src="{{ asset('img/logo_menu.png') }}" alt="" height="35px">
            </div>
            <div class="d-flex menu_alicorp mt-5">
                <ul class="align-content-lg-start">
                    <li><a href="{{ route('index') }}">Inicio</a></li>
                    <li class="submenu">
                        <a href="#" id="dropdown-btn" class="dropdown-btn show">promociones <i
                                class="fa fa-angle-down icono" aria-hidden="true"></i></a>
                        <ul class="ms-5 dropdown">
                            <li><a href="#">Don Victorio</a></li>
                            <li><a href="#">Nicolini</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#" class="dropdown1-btn">Juegos <i class="fa fa-angle-down icono"
                                aria-hidden="true"></i></a>
                        <ul class="ms-5 dropdown1">
                            <li><a href="#">Promo 60 Aniversrio</a></li>
                            <li><a href="#">Inserparable: Nutella y Pan</a></li>
                            <li><a href="#">Nutela 60 años de sonrisas</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('nuevo') }}">Lo Nuevo</a></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
                    <li><a href="{{ route('reclamacion') }}">Libro de Reclamaciones</a></li>
                    <hr class="hr-final">
                </ul>
            </div>

        </div>
    </div>
</div>

