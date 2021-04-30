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
Route::get('/place', [App\Http\Controllers\EstablishmentController::class, 'new'])->name('new_esta')->middleware('auth');
Route::post('/place', [App\Http\Controllers\EstablishmentController::class, 'create'])->name('create_esta')->middleware('auth');
Route::get('/place/{id}', [App\Http\Controllers\EstablishmentController::class, 'show'])->name('create_esta');
Route::get('/delete/place/{id}', [App\Http\Controllers\EstablishmentController::class, 'delete'])->name('create_esta')->middleware('auth');
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'create'])->name('create_esta')->middleware('auth');
Route::get('/delete/comment/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('create_esta')->middleware('auth');
Route::get('/update/comment/{id}', [App\Http\Controllers\CommentController::class, 'page_change'])->name('create_esta')->middleware('auth');
Route::post('/update/comment', [App\Http\Controllers\CommentController::class, 'update'])->name('create_esta')->middleware('auth');
Route::get('/user/{id}', [App\Http\Controllers\HomeController::class, 'user'])->name('home'); 
Route::get('/update/place/{id}', [App\Http\Controllers\EstablishmentController::class, 'page_change'])->name('create_esta')->middleware('auth');
Route::post('/update/place', [App\Http\Controllers\EstablishmentController::class, 'update'])->name('create_esta')->middleware('auth');
Route::get('/update/user/{id}', [App\Http\Controllers\HomeController::class, 'page_change'])->name('create_esta')->middleware('auth');
Route::post('/update/user', [App\Http\Controllers\HomeController::class, 'update'])->name('create_esta')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
