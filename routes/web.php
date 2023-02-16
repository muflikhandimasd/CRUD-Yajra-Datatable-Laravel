<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PostNoAjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('users', [NewUserController::class, 'index'])->name('users.index');
Route::post('users/store', [NewUserController::class, 'store'])->name('users.store');
Route::get('users/edit/{id}/', [NewUserController::class, 'edit']);
Route::post('users/update', [NewUserController::class, 'update'])->name('users.update');
Route::get('users/destroy/{id}/', [NewUserController::class, 'destroy']);

// Route::resource('posts', PostController::class);
Route::get('posts', [PostNoAjaxController::class, "index"]);
Route::get("create", [PostNoAjaxController::class, "create"]);
Route::post('store', [PostNoAjaxController::class, "store"]);
Route::post('upload', [PostNoAjaxController::class, "uploadImage"])->name('ck.upload');
Route::resource('pegawai', PegawaiController::class)->except(['show', 'update']);
