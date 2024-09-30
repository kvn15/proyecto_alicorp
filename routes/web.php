<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alicorpController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\landing_promocional\LandingPromocionalController;

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

});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard/inicio', [AdminController::class, 'inicio'])->name('admin.dashboard.inicio');
    Route::get('/dashboard/juegosWeb', [AdminController::class, 'juegosWeb'])->name('admin.dashboard.juegosWeb');
    Route::get('/dashboard/juegosCamp', [AdminController::class, 'juegosCamp'])->name('admin.dashboard.juegosCamp');
    Route::get('/dashboard/configuracion', [AdminController::class, 'configuracion'])->name('admin.dashboard.configuracion');

    Route::prefix('landing_promocional')->group(function () {
        Route::get('/', [AdminController::class, 'landing'])->name('landing_promocional.index');
        // landing promocional
        Route::get('show/{id}/overview',[LandingPromocionalController::class, 'show'])->name('landing_promocional.show.overview');
        Route::get('show/{id}/indicadores',[LandingPromocionalController::class, 'indicador'])->name('landing_promocional.show.indicadores');
        Route::get('show/{id}/participantes',[LandingPromocionalController::class, 'participante'])->name('landing_promocional.show.participantes');
        Route::get('show/{id}/ganadores',[LandingPromocionalController::class, 'ganador'])->name('landing_promocional.show.ganadores');
        Route::get('show/{id}/configuracion',[LandingPromocionalController::class, 'configuracion'])->name('landing_promocional.show.configuracion');
    });

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/cliente/dashboard', [alicorpController::class, 'dashboard'])->name('cliente.dashboard');
});




require __DIR__.'/auth.php';
