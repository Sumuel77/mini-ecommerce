<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[WebsiteController::class, 'index'])->name('home');
Route::get('/product/category/{catId}',[WebsiteController::class, 'productCategory'])->name('product.category');
Route::get('/product/details/{id}',[WebsiteController::class, 'productDetails'])->name('product.details');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
//    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/category/add',[CategoryController::class,'addCategory'])->name('category.add');
    Route::get('/category/manage',[CategoryController::class,'manageCategory'])->name('category.manage');
    Route::post('/category/store',[CategoryController::class,'saveCategory'])->name('category.store');
    Route::get('/category/status/{id}',[CategoryController::class,'statusCategory'])->name('category.status');
    Route::get('/category/edit/{id}',[CategoryController::class,'editCategory'])->name('category.edit');
    Route::post('/category/update',[CategoryController::class,'updateCategory'])->name('category.update');
    Route::post('/category/delete/',[CategoryController::class,'deleteCategory'])->name('category.delete');

    Route::get('/product/add',[ProductController::class,'addProductForm'])->name('product.add');
    Route::post('/product/store',[ProductController::class,'saveProduct'])->name('product.store');
    Route::get('/product/manage',[ProductController::class,'manageProduct'])->name('product.manage');
    Route::get('/product/edit/{id}',[ProductController::class,'editProduct'])->name('product.edit');
    Route::get('/product/status/{id}',[ProductController::class,'statusProduct'])->name('product.status');
    Route::post('/product/update',[ProductController::class,'updateProduct'])->name('product.update');
    Route::post('/product/delete/',[ProductController::class,'deleteProduct'])->name('product.delete');

    Route::get('/user/add',[UserController::class,'addUser'])->name('user.add');
    Route::get('/user/manage',[UserController::class,'manageUser'])->name('user.manage');
    Route::post('/user/store',[UserController::class,'saveUser'])->name('user.store');
    Route::get('/user/edit{id}',[UserController::class,'editUser'])->name('user.edit');
    Route::post('/user/update',[UserController::class,'updateUser'])->name('user.update');
    Route::post('/user/delete',[UserController::class,'deleteUser'])->name('user.delete');
});
