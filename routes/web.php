<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;

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
Route::get('dashboard',function (){
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('user',UserController::Class)->except(['show']);
Route::resource('category', CategoryController::class)->except(['show']);
Route::resource('author', AuthorController::class);
Route::resource('post', PostController::class);

