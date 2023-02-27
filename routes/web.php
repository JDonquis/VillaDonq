<?php

use App\Http\Controllers\Inscription\InscriptionController;
use App\Http\Controllers\Security\LoginController;
use App\Http\Controllers\Workspace\InstitutionController;
use App\Http\Controllers\Workspace\SchoolLapseController;
use App\Http\Controllers\Workspace\WorkspaceController;
use Illuminate\Support\Facades\Route;
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

Route::get('inscribirse/consulta',[InscriptionController::class,'consult'])->name("consult_request");

Route::post('inscribirse/solicitud',[InscriptionController::class,'save_request'])->name("inscription_request");



Route::group([ 'prefix' => 'workspace', 'namespace' => 'Workspace','middleware' => 'auth' ], function() {
    
    
    Route::get('', [WorkspaceController::class,'index'])->name("workspace");
    
    // Inscription-Workspace
    
        //Requests 
        
            Route::get('solicitudes', [InscriptionController::class,'requests'])->name("requests");

            Route::get('solicitudes/documentos/{id}', [InscriptionController::class,'see_documents'])->name("see_documents");

            Route::post('solicitudes/get', [InscriptionController::class,'requests_show'])->name("requests_show");

            Route::post('solicitudes/filter/{action}',[InscriptionController::class,'filter_requests'])->name('filter_requests');

            Route::post('solicitudes/create',[InscriptionController::class,'create'])->name('inscription_create');

            Route::put('solicitudes/{id}',[InscriptionController::class,'update'])->name('request_update');
        
        //Config
            Route::get('inscripciones/configuracion', [InscriptionController::class,'config'])->name("config");
            Route::post('inscripciones/configuracion/save', [InscriptionController::class,'save_config'])->name("save_config");
            

    // Institution Profile

    Route::get('institucion',[InstitutionController::class,'index'])->name("institution_profile");
    Route::post('institucion',[InstitutionController::class,'store'])->name("create_institution_profile");
    
    // School Lapse

    Route::get('periodo/escolar',[SchoolLapseController::class,'index'])->name("school_lapse");
    
    Route::post('periodo/escolar/save',[SchoolLapseController::class,'save_lapses'])->name("save_lapses");
    


});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
