<?php

use App\Http\Controllers\PessoaController;
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

Route::get('/index', [PessoaController::class, 'index'])->name('pessoas.index');

Route::get('/create', [PessoaController::class, 'create'])->name('pessoas.create');

Route::post('/store', [PessoaController::class, 'store'])->name('pessoas.store');

Route::get('/show/{id}', [PessoaController::class, 'show'])->name('pessoas.show');
