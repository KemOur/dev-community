<?php

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
});

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');
Route::get('/profil', function () { return view('profil'); })->middleware(['auth'])->name('profil');

Route::get('/edit/{id}', [\App\Http\Controllers\UserprofilController::class, 'edit' ]) ->name('editprofil')->middleware(['auth']);
Route::put('/edit/{id}', [\App\Http\Controllers\UserprofilController::class, 'update' ]) ->name('update');

//Route::post('contact', [\App\Http\Controllers\ContactController::class, 'store' ]) ->name('store');
require __DIR__.'/auth.php';
