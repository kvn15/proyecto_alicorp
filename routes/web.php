<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alicorpController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;

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
    
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/inicio', [AdminController::class, 'inicio'])->name('admin.dashboard.inicio');
    Route::get('/admin/dashboard/landing', [AdminController::class, 'landing'])->name('admin.dashboard.landing');
    Route::get('/admin/dashboard/juegosWeb', [AdminController::class, 'juegosWeb'])->name('admin.dashboard.juegosWeb');
    Route::get('/admin/dashboard/juegosCamp', [AdminController::class, 'juegosCamp'])->name('admin.dashboard.juegosCamp');
    Route::get('/admin/dashboard/configuracion', [AdminController::class, 'configuracion'])->name('admin.dashboard.configuracion');

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/cliente/dashboard', [alicorpController::class, 'dashboard'])->name('cliente.dashboard');
});




require __DIR__.'/auth.php';
