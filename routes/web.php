<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WritterController;

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
    return view('home');
});
Route::group(['prefix' => 'blogger'], function () {
    Route::get('/', [BloggerController::class, 'index'])->name('blogger.index');
    Route::get('/{id}/show', [BloggerController::class, 'show'])->name('blogger.show');
    Route::get('/create', [BloggerController::class, 'create'])->name('blogger.create');
    Route::post('/create', [BloggerController::class, 'store'])->name('blogger.store');
    Route::get('/{id}/edit', [BloggerController::class, 'edit'])->name('blogger.edit');
    Route::post('/{id}/edit', [BloggerController::class, 'update'])->name('blogger.update');
    Route::get('/{id}/destroy', [BloggerController::class, 'destroy'])->name('blogger.destroy');
    Route::post('/search', [BloggerController::class, 'search'])->name('blogger.search');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/{id}/show', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/search', [CategoryController::class, 'search'])->name('category.search');
});

Route::group(['prefix' => 'writter'], function () {
    Route::get('/', [WritterController::class, 'index'])->name('writter.index');
    Route::get('/{id}/show', [WritterController::class, 'show'])->name('writter.show');
    Route::get('/create', [WritterController::class, 'create'])->name('writter.create');
    Route::post('/create', [WritterController::class, 'store'])->name('writter.store');
    Route::get('/{id}/edit', [WritterController::class, 'edit'])->name('writter.edit');
    Route::post('/{id}/edit', [WritterController::class, 'update'])->name('writter.update');
    Route::get('/{id}/destroy', [WritterController::class, 'destroy'])->name('writter.destroy');
    Route::post('/search', [WritterController::class, 'search'])->name('writter.search');
});

