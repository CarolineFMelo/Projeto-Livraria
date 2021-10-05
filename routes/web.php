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

use App\Http\Controllers\LivroController;

Route::get('/', [LivroController::class, 'index']);

Route::get('/livros/create', [LivroController::class, 'create']);

Route::get('/livros/{id}', [LivroController::class, 'show']);

Route::post('/livros', [LivroController::class, 'store']);

Route::get('/about', [LivroController::class, 'about']);

Route::get('/buy', [LivroController::class, 'buy']);

Route::delete('/livros/{id}', [LivroController::class, 'destroy']);

Route::get('/livros/edit/{id}', [LivroController::class, 'edit']);

Route::put('/livros/update/{id}', [LivroController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
