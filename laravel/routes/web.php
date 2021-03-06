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

Auth::routes();

// Page principale
Route::get('/', [App\Http\Controllers\EstablishmentController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');

// Utilisateur
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'user'])->name('show_user'); 
Route::get('/update/user/{id}', [App\Http\Controllers\UserController::class, 'page_change'])->name('change_user')->middleware('auth');
Route::post('/update/user', [App\Http\Controllers\UserController::class, 'update'])->name('update_user')->middleware('auth');
Route::get('/pub', [App\Http\Controllers\CommentController::class, 'pub'])->name('show_pub'); 

// Etablissement
Route::get('/place/{id}', [App\Http\Controllers\EstablishmentController::class, 'show'])->name('show_esta');
Route::get('/place', [App\Http\Controllers\EstablishmentController::class, 'new'])->name('new_esta')->middleware('auth');
Route::post('/place', [App\Http\Controllers\EstablishmentController::class, 'create'])->name('create_esta')->middleware('auth');
Route::get('/delete/place/{id}', [App\Http\Controllers\EstablishmentController::class, 'delete'])->name('delete_esta')->middleware('auth');
Route::get('/update/place/{id}', [App\Http\Controllers\EstablishmentController::class, 'page_change'])->name('change_esta')->middleware('auth');
Route::post('/update/place', [App\Http\Controllers\EstablishmentController::class, 'update'])->name('update_esta')->middleware('auth');

// Commentaire
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'create'])->name('create_comment')->middleware('auth');
Route::get('/delete/comment/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('delete_comment')->middleware('auth');
Route::get('/update/comment/{id}', [App\Http\Controllers\CommentController::class, 'page_change'])->name('change_comment')->middleware('auth');
Route::post('/update/comment', [App\Http\Controllers\CommentController::class, 'update'])->name('update_comment')->middleware('auth');

