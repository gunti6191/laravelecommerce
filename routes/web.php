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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function(){
    return view('ecomProject.dashboard');
});

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name("users.create");
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name("users.store");
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name("users.edit");
Route::post('/users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name("users.update");
Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name("users.delete");

Route::get("/categories", [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name("categories.create");
Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name("categories.store");
Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name("categories.edit");
Route::post('/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name("categories.update");
Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name("categories.delete");

Route::get('/brands', [App\Http\Controllers\BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [App\Http\Controllers\BrandController::class, 'create'])->name("brands.create");
Route::post('/brands/store', [App\Http\Controllers\BrandController::class, 'store'])->name("brands.store");
Route::get('/brands/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit'])->name("brands.edit");
Route::post('/brands/update/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name("brands.update");
Route::get('/brands/delete/{id}', [App\Http\Controllers\BrandController::class, 'delete'])->name("brands.delete");

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name("products.create");
Route::post('/products/store', [App\Http\Controllers\ProductsController::class, 'store'])->name("products.store");
Route::get('/products/edit/{slug}', [App\Http\Controllers\ProductsController::class, 'edit'])->name("products.edit");
Route::post('/products/update/{slug}', [App\Http\Controllers\ProductsController::class, 'update'])->name("products.update");
Route::get('/products/delete/{slug}', [App\Http\Controllers\ProductsController::class, 'delete'])->name("products.delete");
