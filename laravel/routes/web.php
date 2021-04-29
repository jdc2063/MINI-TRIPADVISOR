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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [App\Http\Controllers\EstablishmentController::class, 'home'])->name('home');
Route::get('/place', [App\Http\Controllers\EstablishmentController::class, 'new'])->name('new_esta');
Route::post('/place', [App\Http\Controllers\EstablishmentController::class, 'create'])->name('create_esta');
Route::get('/place/{id}', [App\Http\Controllers\EstablishmentController::class, 'show'])->name('create_esta');
Route::post('/delete/place', [App\Http\Controllers\EstablishmentController::class, 'delete'])->name('create_esta');
Route::post('/dcomment', [App\Http\Controllers\CommentController::class, 'create'])->name('create_esta');
Route::post('/delete/comment', [App\Http\Controllers\CommentController::class, 'delete'])->name('create_esta');