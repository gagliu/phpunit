<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return 'hola soy about';
});

//Retorna una vista. Retorna el formulario. Veo el formulario
Route::view('profile', 'profile');

//Guarda la imagen. Es la configuracion que vemos cuando creamos un controlador
//Antes del refactoring
/* Route::post('profile', function (Illuminate\Http\Request $request) {
    
    //Se sube el archivo a la carpeta profiles.
    //Es la carpeta /storage/framework/testing/disks/local/profiles
    $request->file('photo')->store('profiles');

    return redirect('profile');
}); */

//El mismo codigo de arriba refactorizado
Route::post('profile', [App\Http\Controllers\ProfileController::class, 'upload']);


