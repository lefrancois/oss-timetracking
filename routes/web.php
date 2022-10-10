<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/t', [MainController::class, 'create'])->name('create');
Route::get('/t/{id}', [MainController::class, 'tracker'])->name('tracker');

Route::get('/legal', [MainController::class, 'legal'])->name('legal');
Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
