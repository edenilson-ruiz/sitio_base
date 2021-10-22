<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//

Route::group(['middleware' => ['auth','role:super-admin']], function() {

    // Route::resource('users', UserController::class);
    // Route::resource('roles', RoleController::class);
    Route::view('roles', 'livewire.roles.index');
    Route::view('users', 'livewire.users.index');
    Route::view('generos', 'livewire.generos.index');
    Route::view('areas_atencion', 'livewire.areas_atencion.index');
    Route::view('centros', 'livewire.centros.index');
    Route::view('empleados', 'livewire.empleados.index');
});
