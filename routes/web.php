<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('login');
});

Route::get('login2', [EnrollmentController::class, 'login'])->name('login2');

Route::get('tieneDni', [EnrollmentController::class, 'tieneDni'])->name('enrollment.tieneDni');
Route::post('tieneDni', [EnrollmentController::class, 'derivar'])->name('enrollment.derivar');

Route::get('FormValidaRenaper', [EnrollmentController::class, 'FormValidaRenaper'])->name('FormValidaRenaper');

Route::post('FormValidaRenaper', [EnrollmentController::class, 'verificarEnRenaper'])->name('enrollment.verificarEnRenaper');



Route::get('nonDniForm', [EnrollmentController::class, 'nonDniForm'])->name('enrollment.nonDniForm');
Route::post('sendToEMAIL', [EnrollmentController::class, 'sendToEMAIL'])->name('enrollment.sendToEMAIL');


Route::get('altaUsuario/{usuario}', [EnrollmentController::class, 'altaUsuario'])->name('enrollment.altaUsuario');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
