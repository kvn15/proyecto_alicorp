@extends('admin.dashboard')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row landing-page">
            <div class="col-12">
                <h1>Juego Campaña</h1>
                <hr class="hr-principal">
            </div>
            <div class="col-12 d-flex justify-content-between">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Buscar...">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <div class="estadoFiltro">
                    <div class="search-estado">
                        <div class="d-flex align-items-center estadol">
                            <input type="text" class="search-input" placeholder="Estado">
                            <span>Activo</span>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                        
                    </div>
                    <div class="search-filtro">
                        <button><i class="fas fa-search search-icon"></i></button>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row landing">         
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>       
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#868686;border-color:#868686">Inactivo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" >Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#000000;border-color:#000000">Finalizado</a>
                </div>
            </div>                
        </div>
        <div class="row landing">         
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>       
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#868686;border-color:#868686">Inactivo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" >Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juegocamp.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#000000;border-color:#000000">Finalizado</a>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection