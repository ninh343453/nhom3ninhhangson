<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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



Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category:delete{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/show{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');


Route::get('/music/index', [MusicController::class, 'index'])->name('music.index');
Route::get('/music/create', [MusicController::class, 'create'])->name('music.create');
Route::get('/music:delete{id}', [MusicController::class, 'destroy'])->name('music.destroy');
Route::get('/music/edit{id}', [MusicController::class, 'edit'])->name('music.edit');
Route::post('/music/update{id}', [MusicController::class, 'update'])->name('music.update');
Route::get('/music/show{id}', [MusicController::class, 'show'])->name('music.show');
Route::post('/music/store', [MusicController::class, 'store'])->name('music.store');
Route::get('/music/home', [MusicController::class, 'home'])->name('music.home');




Route::post('/', [UserController::class, 'store'])->name('auth.register');
Route::get('/register', [UserController::class, 'show'])->name('welcome.register');
Route::get('/', [UserController::class, 'showLogin'])->name('welcome.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/index', [UserController::class, 'login'])->name('auth.login');

Route::get('/clien/home', [UserController::class, 'home'])->name('pages.homepage');
Route::get('/music/index', [UserController::class, 'index'])->name('music.index');
Route::get('/clien/deital/{id}', [UserController::class, 'detail'])->name('pages.detail');


Route::get('/add-to-cart/{id}', [HomeController::class, 'addToCart']);
Route::get('/cart', [HomeController::class, 'cart'])->name('pages.cart');
Route::post('/update-cart/{id}', [HomeController::class, 'update'])->name('update-cart');
Route::delete('/remove-from-cart/{id}', [HomeController::class, 'remove']);



