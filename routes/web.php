<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoServicioController;

Route::apiResource('tipo-servicio', TipoServicioController::class);
// GET     [http://localhost:8000/tipo-servicio](http://localhost:8000/tipo-servicio)           
//POST    [http://localhost:8000/tipo-servicio](http://localhost:8000/tipo-servicio)           
//GET     [http://localhost:8000/tipo-servicio/{id}](http://localhost:8000/tipo-servicio/{id}) 
//PUT     [http://localhost:8000/tipo-servicio/{id}](http://localhost:8000/tipo-servicio/{id}) 
//DELETE  [http://localhost:8000/tipo-servicio/{id}](http://localhost:8000/tipo-servicio/{id}) 


Route::get('/', function () {
    return view('welcome');
});
