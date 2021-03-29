<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('login');
});

Route::get('/clear-cache', function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
});

Route::get('login2', [EnrollmentController::class, 'login'])->name('login2');

Route::get('tieneDni', [EnrollmentController::class, 'tieneDni'])->name('enrollment.tieneDni');
Route::post('tieneDni', [EnrollmentController::class, 'derivar'])->name('enrollment.derivar');

Route::get('FormValidaRenaper', [EnrollmentController::class, 'FormValidaRenaper'])->name('FormValidaRenaper');

Route::get('prueba', [EnrollmentController::class, 'prueba'])->name('prueba');


Route::post('FormValidaRenaper', [EnrollmentController::class, 'verificarEnRenaper'])->name('enrollment.verificarEnRenaper');



Route::get('nonDniForm', [EnrollmentController::class, 'nonDniForm'])->name('enrollment.nonDniForm');
Route::post('sendToEMAIL', [EnrollmentController::class, 'sendToEMAIL'])->name('enrollment.sendToEMAIL');


Route::get('altaUsuario/{usuario}', [EnrollmentController::class, 'altaUsuario'])->name('enrollment.altaUsuario');

Route::match(['put', 'patch'],'grabarUsuario/{id_promotorx}', [EnrollmentController::class, 'grabarUsuario'])->name('enrollment.grabarUsuario');

Route::match(['put', 'patch'],'login.primerIngreso/{id_usuarix}', [loginController::class, 'primerIngreso'])->name('login.primerIngreso');

Route::get('FormOlvidePass/', [EnrollmentController::class, 'formOlvidePass'])->name('FormOlvidePass');
Route::post('recuperoPass/', [EnrollmentController::class, 'recuperoPass'])->name('recuperoPass');
Route::match(['put', 'patch'],'grabarUsuarioNuevo/{id_usuarix}', [EnrollmentController::class, 'grabarUsuarioNuevo'])->name('enrollment.grabarUsuarioNuevo');

Route::post('login2', [LoginController::class, 'ingresar'])->name('login.login');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
