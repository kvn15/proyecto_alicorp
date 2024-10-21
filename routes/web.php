<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alicorpController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\landing_promocional\LandingPromocionalController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\GameMemoriaController;
use App\Http\Controllers\Admin\RaspaGanaController;
use App\Http\Controllers\Admin\RuletaController;
use App\Http\Controllers\Admin\ViewLandingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\XplorerController;
use App\Http\Controllers\AdminPanel\AdminPanelController;
use App\Http\Controllers\AdminPanel\HomeInicioController;
use App\Http\Controllers\AdminPanel\CalendarioController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\VistaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(alicorpController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/nuevo', 'nuevo')->name('nuevo');
    Route::get('/juegos', 'juegos')->name('juegos');
    Route::get('/contacto', 'contacto')->name('contacto');
    Route::get('/reclamacion', 'reclamacion')->name('reclamacion');
    Route::get('/promocion', 'promocion')->name('promocion');
    Route::get('/calendario', 'calendario')->name('calendario');

});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    //Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    //Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    //Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    //Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard/inicio', [AdminController::class, 'inicio'])->name('admin.dashboard.inicio');
    Route::get('/dashboard/juegosWeb', [AdminController::class, 'juegosWeb'])->name('admin.dashboard.juegosWeb');
    Route::get('/dashboard/juegosCamp', [AdminController::class, 'juegosCamp'])->name('admin.dashboard.juegosCamp');
    Route::get('/dashboard/configuracion', [AdminController::class, 'configuracion'])->name('dashboard.configuracion');
    Route::get('/dashboard/editar/Perfil', [AdminController::class, 'EditProfile'])->name('dashboard.editar.perfil');
    Route::post('/dashboard/grabar/Perfil', [AdminController::class, 'StoreProfile'])->name('dashboard.grabar.perfil');
    Route::post('/dashboard/password/Perfil', [AdminController::class, 'UpdatePassword'])->name('dashboard.password.perfil');

    // mis proyectos
    Route::get('/dashboard/mis-proyectos', [AdminController::class, 'dashboardMio'])->name('admin.dashboard.mio');
    Route::get('/dashboard/juegosWeb/mis-proyectos', [AdminController::class, 'juegosWebMio'])->name('admin.dashboard.juegosWeb.mio');
    Route::get('/dashboard/juegosCamp/mis-proyectos', [AdminController::class, 'juegosCampMio'])->name('admin.dashboard.juegosCamp.mio');

    Route::prefix('landing_promocional')->group(function () {
        Route::get('/', [AdminController::class, 'landing'])->name('landing_promocional.index');
        Route::get('/mio', [AdminController::class, 'landingMio'])->name('landing_promocional.index.mio');
        // landing promocional asignacion
        Route::get('show/{id}/overview',[LandingPromocionalController::class, 'show'])->name('landing_promocional.show.overview');
        Route::get('show/{id}/indicadores',[LandingPromocionalController::class, 'indicador'])->name('landing_promocional.show.indicadores');
        Route::get('show/{id}/participantes',[LandingPromocionalController::class, 'participante'])->name('landing_promocional.show.participantes');
        Route::get('show/{id}/ganadores',[LandingPromocionalController::class, 'ganador'])->name('landing_promocional.show.ganadores');
        Route::get('show/{id}/configuracion',[LandingPromocionalController::class, 'configuracion'])->name('landing_promocional.show.configuracion');
        Route::get('show/{id}/personalizar',[LandingPromocionalController::class, 'personalizarLanding'])->name('landing_promocional.show.personalizarLanding');
    });

    Route::prefix('juego_web')->group(function () {
        Route::get('/', [AdminController::class, 'landing'])->name('juego_web.index');
        // landing promocional asignacion
        Route::get('show/{id}/overview',[LandingPromocionalController::class, 'show'])->name('juego_web.show.overview');
        Route::post('show/{id}/publicar',[LandingPromocionalController::class, 'publicar'])->name('juego_web.show.publicar');
        Route::get('show/{id}/indicadores',[LandingPromocionalController::class, 'indicador'])->name('juego_web.show.indicadores');
        Route::get('show/{id}/participantes',[LandingPromocionalController::class, 'participante'])->name('juego_web.show.participantes');
        Route::get('show/{id}/ganadores',[LandingPromocionalController::class, 'ganador'])->name('juego_web.show.ganadores');
        Route::get('show/{id}/configuracion',[LandingPromocionalController::class, 'configuracion'])->name('juego_web.show.configuracion');
    });
    
    Route::prefix('juego_campana')->group(function () {
        Route::get('/', [AdminController::class, 'landing'])->name('juego_campana.index');
        // landing promocional asignacion
        Route::get('show/{id}/overview',[LandingPromocionalController::class, 'show'])->name('juego_campana.show.overview');
        Route::get('show/{id}/indicadores',[LandingPromocionalController::class, 'indicador'])->name('juego_campana.show.indicadores');
        Route::get('show/{id}/participantes',[LandingPromocionalController::class, 'participante'])->name('juego_campana.show.participantes');
        Route::get('show/{id}/ganadores',[LandingPromocionalController::class, 'ganador'])->name('juego_campana.show.ganadores');
        Route::get('show/{id}/configuracion',[LandingPromocionalController::class, 'configuracion'])->name('juego_campana.show.configuracion');
        Route::get('show/{id}/asignacion',[LandingPromocionalController::class, 'asignacion'])->name('juego_campana.show.asignacion');
    });

    Route::prefix('/')->group(function () {
        Route::get('show/{id}/personalizar/game/memoria',[LandingPromocionalController::class, 'personalizarJuego'])->name('juego_campana.show.personalizarJuego');
        Route::get('show/{id}/personalizar/game/raspa_gana',[LandingPromocionalController::class, 'personalizarJuegoRaspaGana'])->name('juego_campana.show.personalizarJuego.raspagana');
        Route::get('show/{id}/personalizar/game/ruleta',[LandingPromocionalController::class, 'personalizarRuleta'])->name('juego_campana.show.personalizarJuego.ruleta');
    });

    // registros
    Route::put('/proyecto/{id}', [ProjectController::class, 'guardarDatosInfoProyecto'])->name('project.config.proyecto');
    Route::put('/dominio/{id}', [ProjectController::class, 'guardarDatosDominio'])->name('project.config.dominio');
    Route::put('/vigencia/{id}', [ProjectController::class, 'guardarDatosVigencia'])->name('project.config.vigencia');
    Route::put('/estilo/{id}', [ProjectController::class, 'guardarDatosEstilos'])->name('project.config.estilo');
    Route::put('/premio/{id}', [ProjectController::class, 'guardarDatosPremios'])->name('project.config.premio');
    Route::get('/premio/{id}', [ProjectController::class, 'obtenerPremio'])->name('project.config.premio.get');
    Route::put('/estado/{id}', [ProjectController::class, 'guardarDatosEstado'])->name('project.config.estado');
    Route::put('/condicion/{id}', [ProjectController::class, 'guardarDatosCondicion'])->name('project.config.condicion');
    Route::get('/condicion/{id}', [ProjectController::class, 'obtenerCondicion'])->name('project.config.condicion.get');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/cliente/dashboard', [alicorpController::class, 'dashboard'])->name('cliente.dashboard');
    Route::get('/cliente/configuracion', [alicorpController::class, 'PUpdate'])->name('cliente.configuracion');
    Route::get('/cliente/contrasena', [alicorpController::class, 'contrasena'])->name('cliente.contrasena');
    Route::post('cliente/password/update', [alicorpController::class, 'UpdatePassword'])->name('cliente.password.update');
    Route::post('/cliente/profile/update', [alicorpController::class, 'UpdateProfile'])->name('cliente.update.user');
});

Route::controller(XplorerController::class)->group(function () {
    Route::get('xplorer/login', 'loginForm')->name('xplorer.login');
    Route::post('xplorer/login','login');
    Route::get('xplorer/logout','logout')->name('xplorer.logout');
});

Route::middleware('auth:xplorer')->group(function () {
    Route::get('/xplorer/dashboard', function () {
        return view('xplorer.dashboard');
    });
});

Route::controller(AdminPanelController::class)->group(function () {
    Route::get('/adminPanel/login','showLoginForm')->name('adminPanel.login');
    Route::post('/adminPanel/login','login')->name('adminPanel.login.submit');
    Route::get('adminPanel/logout','logout')->name('adminPanel.logout');
});

Route::controller(HomeInicioController::class)->group(function () {
    Route::get('/adminPanel/inicio/dashboard', 'dashboard')->name('adminPanel.dashboard');
    Route::post('adminPanel/store/slider', 'StoreSlider')->name('adminPanel.store.slider');
    Route::post('/adminPanel/update/slider','UpdateSlider')->name('adminPanel.update.slider');

    Route::get('/adminPanel/dashboard', 'AllSlide')->name('adminPanel.dashboard');
    Route::get('/adminPanel/edit/slider/{id}', 'EditSlide')->name('adminPanel.edit.slide');
    Route::get('/adminPanel/delete/slide/{id}', 'DeleteSlider')->name('adminPanel.delete.slide');

    Route::get('/adminPanel/inicio/promociones', 'AllPromo')->name('adminPanel.inicio.sec_promo');
    Route::post('adminPanel/inicio/store/promo', 'StorePromociones')->name('adminPanel.inicio.store.promo');
    Route::get('/adminPanel/inicio/delete/promo/{id}', 'DeletePromos')->name('adminPanel.inicio.delete.promo');

    
});

Route::controller(CalendarioController::class)->group(function () {
    Route::get('/adminPanel/calendario/slider', 'AllSlideC')->name('adminPanel.calendario.slider');
    Route::post('/adminPanel/calendario/store/slider', 'StoreSliderC')->name('adminPanel.calendario.store.slider');
    Route::get('/adminPanel/calendario/delete/slide/{id}', 'DeleteSlideC')->name('adminPanel.calendario.delete.slide');    

    Route::get('/adminPanel/calendario/cards', 'AllCards')->name('adminPanel.calendario.cards'); 
    Route::post('/adminPanel/calendario/store/cards', 'storeCards')->name('adminPanel.calendario.item.store');
    Route::post('/adminPanel/calendario/update/card/{id}', 'UpdateCard')->name('adminPanel.calendario.item.update');
    Route::get('/adminPanel/calendario/delete/card/{id}', 'DeleteCard')->name('adminPanel.calendario.delete.card');
});

// Route::middleware('auth:adminPanel')->group(function () {
//     Route::get('/adminPanel/dashboard', function () {
//         return view('adminPanel.dashboard');
//     });
// });

Route::prefix('landing')->group(function () {
    // View
    Route::get('/{hub}', [ViewLandingController::class, 'index'])->name('landing.view');
    Route::post('/{id}/post', [ViewLandingController::class, 'store'])->name('landing.post');
    Route::post('/{id}/postHtml', [ViewLandingController::class, 'storeHtml'])->name('landing.post.html');
});

Route::prefix('juegoWeb')->group(function () {
    Route::prefix('game_memoria')->group(function () {
        Route::get('/{hub}/registro', [GameMemoriaController::class, 'index'])->name('juegoWeb.juego.view.registro');
        Route::post('/{id}/registro', [GameMemoriaController::class, 'store'])->name('juegoWeb.juego.post.registro');
        Route::get('/{hub}', [GameMemoriaController::class, 'show'])->name('juegoWeb.juego.view.memoria');
        Route::post('/{id}/registroPersonalizar', [GameMemoriaController::class, 'storePersonalizar'])->name('juegoWeb.juego.post.registro.personalizar');
        Route::post('/{id}/postHtml', [GameMemoriaController::class, 'storeHtml'])->name('juegoWeb.memoria.post.html');
        Route::post('/{id}/updateGanador', [GameMemoriaController::class, 'updateGanador'])->name('juegoWeb.juego.ganador.memoria');
    });

    Route::prefix('game_raspa_gana')->group(function () {
        Route::get('/{hub}', [RaspaGanaController::class, 'show'])->name('juegoWeb.juego.view.raspagana');
        Route::get('/{hub}/registro', [RaspaGanaController::class, 'index'])->name('juegoWeb.juego.view.registro.raspagana');
        Route::post('/{hub}/registro', [RaspaGanaController::class, 'store'])->name('juegoWeb.juego.post.registro.raspagana');
        Route::post('/{id}/registroPersonalizar', [RaspaGanaController::class, 'storePersonalizar'])->name('juegoWeb.juego2.post.registro.personalizar');
        Route::post('/{id}/updateGanador', [RaspaGanaController::class, 'updateGanador'])->name('juegoWeb.juego.ganador.raspagana');
    });

    Route::prefix('ruleta')->group(function () {
        Route::post('/{id}/registroPersonalizar', [RuletaController::class, 'storePersonalizar'])->name('juegoWeb.juego3.post.registro.personalizar');
        Route::post('/registroImgPremio/{id}', [RuletaController::class, 'storeImgPremio'])->name("juegoWeb.juego3.registroPremio.img");
        Route::post('/registroImgPremioFinal/{id}', [RuletaController::class, 'storeImgPremioFinal'])->name("juegoWeb.juego3.registroPremioFinal.img");
        Route::get('/{hub}', [RuletaController::class, 'show'])->name('juegoWeb.juego.view.ruleta');
        Route::get('/{hub}/registro', [RuletaController::class, 'index'])->name('juegoWeb.juego.view.registro.ruleta');
        Route::post('/{hub}/registro', [RuletaController::class, 'store'])->name('juegoWeb.juego.post.registro.ruleta');
    });
});

Route::prefix('juegoCampana')->group(function () {
    Route::prefix('game_memoria')->group(function () {
        Route::get('/{hub}/registro', [GameMemoriaController::class, 'index'])->name('juegoCampana.juego.view.registro');
        Route::post('/{id}/registro', [GameMemoriaController::class, 'store'])->name('juegoCampana.juego.post.registro');
        Route::get('/{hub}', [GameMemoriaController::class, 'show'])->name('juegoCampana.juego.view.memoria');
        Route::post('/{id}/registroPersonalizar', [GameMemoriaController::class, 'storePersonalizar'])->name('juegoCampana.juego.post.registro.personalizar');
        Route::post('/{id}/postHtml', [GameMemoriaController::class, 'storeHtml'])->name('juegoCampana.memoria.post.html');
        Route::post('/{id}/updateGanador', [GameMemoriaController::class, 'updateGanador'])->name('juegoCampana.juego.ganador.memoria');
    });

    Route::prefix('game_raspa_gana')->group(function () {
        Route::get('/{hub}', [RaspaGanaController::class, 'show'])->name('juegoCampana.juego.view.raspagana');
        Route::get('/{hub}/registro', [RaspaGanaController::class, 'index'])->name('juegoCampana.juego.view.registro.raspagana');
        Route::post('/{hub}/registro', [RaspaGanaController::class, 'store'])->name('juegoCampana.juego.post.registro.raspagana');
        Route::post('/{id}/registroPersonalizar', [RaspaGanaController::class, 'storePersonalizar'])->name('juegoCampana.juego2.post.registro.personalizar');
        Route::post('/{id}/updateGanador', [RaspaGanaController::class, 'updateGanador'])->name('juegoCampana.juego.ganador.raspagana');
    });

    Route::prefix('ruleta')->group(function () {
        Route::post('/{id}/registroPersonalizar', [RuletaController::class, 'storePersonalizar'])->name('juegoCampana.juego3.post.registro.personalizar');
        Route::post('/registroImgPremio/{id}', [RuletaController::class, 'storeImgPremio'])->name("juegoCampana.juego3.registroPremio.img");
        Route::post('/registroImgPremioFinal/{id}', [RuletaController::class, 'storeImgPremioFinal'])->name("juegoCampana.juego3.registroPremioFinal.img");
        Route::get('/{hub}', [RuletaController::class, 'show'])->name('juegoCampana.juego.view.ruleta');
        Route::get('/{hub}/registro', [RuletaController::class, 'index'])->name('juegoCampana.juego.view.registro.ruleta');
        Route::post('/{hub}/registro', [RuletaController::class, 'store'])->name('juegoCampana.juego.post.registro.ruleta');
    });
});

Route::post('game/ganador/{id}', [ParticipantController::class, 'ganador'])->name('post.ganador');
Route::get('/export-participante/{id}', [ParticipantController::class, 'export'])->name("export.participante");
Route::get('/export-ganador/{id}', [ParticipantController::class, 'exportGanador'])->name("export.ganadores");
Route::get('/export-asignacion/{id}', [ParticipantController::class, 'exportAsignacion'])->name("export.asignacion");


require __DIR__.'/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
