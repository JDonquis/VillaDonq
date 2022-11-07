<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Workspace\WorkspaceController;
use App\Http\Controllers\Security\LoginController;
use App\Http\Controllers\Inscription\InscriptionController;
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
})->name("welcome");

// Login & Logout
Route::get('login',[LoginController::class,'index'])->name("login");
Route::post('login',[LoginController::class,'login'])->name("login_request");
Route::get('logout',[LoginController::class,'logout'])->name("logout");

// Inscription
Route::get('inscribirse',[InscriptionController::class,'index'])->name("inscription");

Route::post('inscribirse/solicitud',[InscriptionController::class,'save_request'])->name("inscription_request");

Route::group([ 'prefix' => 'workspace', 'namespace' => 'Workspace','middleware' => 'auth' ], function() {
    
    
    Route::get('', [WorkspaceController::class,'index'])->name("workspace");
    Route::get('solicitudes', [InscriptionController::class,'requests'])->name("requests");
    Route::get('solicitudes/get', [InscriptionController::class,'requests_show'])->name("requests_show");
    Route::post('solicitudes/create',[InscriptionController::class,'create'])->name('inscription_create');
    // Route::get('permission/create', [PermissionController::class,'create'])->name("permission-create");


});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
