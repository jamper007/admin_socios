<?php
use App\Http\Controllers\SocioController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController; // Ensure FotoController exists in this namespace
/*
Route::get('/', function () {
    return view('inicio');
});
Route::get('/socios',[SocioController::class, 'index']);*/

//Creacion de recursos para el CRUD de socios(create,Read,Update,Delete)
route::get('/',[SocioController::class,'inicio']);
route::resource('socios', SocioController::class)->middleware('auth');



Route::get('/socios/create', function () {
    return view('socio.create');
})->middleware('auth');

Route::get('/socios/edit', function () {
    return view('socio.edit');
})->middleware('auth');

Route::get('/fotos/captura', function () {
    return view('foto/captura');
})->middleware('auth');



Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes([
    'register' => false,
    'reset' => false
]);
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

//Guarda la foto en la ruta especificada
// Ensure FotoController is correctly imported and the 'guardar' method exists
Route::post('/guardar-foto', [FotoController::class, 'guardar']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



