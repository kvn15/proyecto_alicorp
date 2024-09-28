@extends('admin.dashboard')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <h1>Últimos Proyectos</h1>
        <div class="row proyecto">         
                
            <div class="col-1 p-2 me-3">
                <img src="{{asset('img/proy_new.png')}}" alt="" height="100px" width="110px">
            </div>
            <div class="col-2 mt-4">
                <h2>Nuevo Proyecto Campaña Web</h2>
                <h3>Landing Promocional</h3>
                <p>Ultima actualización: 12/08/2024 16:34</p>
            </div>
            <div class="col-1 mt-4">
                <h2>Creación</h2>
                <h3>13/08/2024</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Estado</h2>
                <button class="button--primary">Inactivo</button>
            </div>
            <div class="col-1 mt-4">
                <h2>Fecha Inicio</h2>
                <h3>-</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Fecha Fin</h2>
                <h3>-</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Participantes</h2>
                <h3>-</h3>
            </div>
            <div class="col-3 mt-4">
                <h2>Acciones</h2>
                <div class="botonera">
                    <button class="button--secondary">Configurar</button>
                    <button class="button--secondary">Personalizar</button>
                    <button class="button--3">Publicar</button>
                </div>
                
            </div>
        </div>
        
        <div class="row proyecto mt-3">         
                
            <div class="col-1 p-2 me-3">
                <img src="{{asset('img/proy_new.png')}}" alt="" height="100px" width="110px">
            </div>
            <div class="col-2 mt-4">
                <h2>Nuevo Proyecto Campaña Web</h2>
                <h3>Landing Promocional</h3>
                <p>Ultima actualización: 12/08/2024 16:34</p>
            </div>
            <div class="col-1 mt-4">
                <h2>Creación</h2>
                <h3>13/08/2024</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Estado</h2>
                <button class="button--primary">Inactivo</button>
            </div>
            <div class="col-1 mt-4">
                <h2>Fecha Inicio</h2>
                <h3>-</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Fecha Fin</h2>
                <h3>-</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Participantes</h2>
                <h3>-</h3>
            </div>
            <div class="col-3 mt-4">
                <h2>Acciones</h2>
                <div class="botonera">
                    <button class="button--secondary">Configurar</button>
                    <button class="button--secondary">Personalizar</button>
                    <button class="button--3">Publicar</button>
                </div>
                
            </div>
        </div>

        <div class="row proyecto mt-3">         
                
            <div class="col-1 p-2 me-3">
                <img src="{{asset('img/proy_new.png')}}" alt="" height="100px" width="110px">
            </div>
            <div class="col-2 mt-4">
                <h2>Nuevo Proyecto Campaña Web</h2>
                <h3>Landing Promocional</h3>
                <p>Ultima actualización: 12/08/2024 16:34</p>
            </div>
            <div class="col-1 mt-4">
                <h2>Creación</h2>
                <h3>13/08/2024</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Estado</h2>
                <button class="button--primary">Inactivo</button>
            </div>
            <div class="col-1 mt-4">
                <h2>Fecha Inicio</h2>
                <h3>-</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Fecha Fin</h2>
                <h3>-</h3>
            </div>
            <div class="col-1 mt-4">
                <h2>Participantes</h2>
                <h3>-</h3>
            </div>
            <div class="col-3 mt-4">
                <h2>Acciones</h2>
                <div class="botonera">
                    <button class="button--secondary">Configurar</button>
                    <button class="button--secondary">Personalizar</button>
                    <button class="button--3">Publicar</button>
                </div>
                
            </div>
        </div> 
        
        <div class="row">
            <div class="col-12 cab-landind">
                <div>
                    <h1 class="mt-5">Landing Promocional</h1>
                </div>
                
                <div class="hr-bloque">
                   {{-- <p> <a href="">Ver más</a></p>   
                    <hr class="hr-vermas"> --}}
                </div>    
            </div>                    
        </div>
        
        <div class="row landing">         
            <div class="card">
                <img src="{{asset('img/Rectangle5.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>A clases con inteligencia</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>       
            <div class="card">
                <img src="{{asset('img/proy_new.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>A clases con inteligencia</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#868686;border-color:#868686">Inactivo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/Rectangle5.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>A clases con inteligencia</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" >Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/Rectangle5.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>A clases con inteligencia</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/Rectangle6.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>A clases con inteligencia</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#000000;border-color:#000000">Finalizado</a>
                </div>
            </div>                
        </div>

        {{-- juegos web --}}
        <div class="row">
            <div class="col-12 cab-juegoweb">
                <div>
                    <h1 class="mt-5">Juegos Web</h1>
                </div>
                
                <div class="hr-bloque">
                   {{-- <p> <a href="">Ver más</a></p>   
                    <hr class="hr-vermas"> --}}
                </div>    
            </div>                    
        </div>
        
        <div class="row juegosweb">         
            <div class="card">
                <img src="{{asset('img/juego2.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Raspa y gana con casino</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>       
            <div class="card">
                <img src="{{asset('img/proy_new.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Raspa y gana con casino</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#868686;border-color:#868686">Inactivo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juego2.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Raspa y gana con casino</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" >Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/juego2.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Raspa y gana con casino</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/parti-3.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Gana a toda hora</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#000000;border-color:#000000">Finalizado</a>
                </div>
            </div>                
        </div>
    
        {{-- juegos Campañas --}}
        <div class="row">
            <div class="col-12 cab-juegoweb">
                <div>
                    <h1 class="mt-5">Juegos Campañas</h1>
                </div>
                
                <div class="hr-bloque">
                   {{-- <p> <a href="">Ver más</a></p>   
                    <hr class="hr-vermas"> --}}
                </div>    
            </div>                    
        </div>
        
        <div class="row juegoscampana">         
            <div class="card">
                <img src="{{asset('img/proy_new.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Nueva Campaña Ruleta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#868686;border-color:#868686">Inactivo</a>
                </div>
            </div>       
            <div class="card">
                <img src="{{asset('img/ruleta.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Rueta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" style="color:#868686;border-color:#868686">Inactivo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/ruleta.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Rueta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button" >Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/ruleta.png')}}" alt="Imagen de ejemplo" class="card-img">
                <div class="card-content">
                    <h2>Rueta</h2>
                    <p>Fecha: 12/08/2024</p>
                    <a href="#" class="button">Activo</a>
                </div>
            </div>  
            <div class="card">
                <img src="{{asset('img/ruleta.png')}}" alt="Imagen de ejemplo" class="card-img">
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

