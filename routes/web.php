<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
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




Route::get('/', function(){
    return view('auth.login');
})->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Auth::routes();

Route::middleware(['auth','CheckRole:Admin'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('category')->group(function(){
    Route::get('/',[CategoryController::class, 'index'])->name('category');
    Route::post('/',[CategoryController::class, 'store'])->name('category.store');
    Route::post('/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/delete/{id}',[CategoryController::class, 'delete']);
});

Route::prefix('product')->group(function(){
    Route::get('/',[ProductController::class, 'index'])->name('product');
    Route::get('/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/',[ProductController::class, 'store'])->name('product.store');
    Route::post('/{id}',[ProductController::class, 'update'])->name('product.update');
    Route::get('/{id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::get('/delete/{id}',[ProductController::class, 'delete']);
});

Route::prefix('inventory')->group(function(){
    Route::get('/',[InventoryController::class, 'index'])->name('inventory');
    Route::get('/create',[InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/',[InventoryController::class, 'store'])->name('inventory.store');
    Route::post('/{id}',[InventoryController::class, 'update'])->name('inventory.update');
    Route::get('/{id}',[InventoryController::class, 'edit'])->name('inventory.edit');
    Route::get('/delete/{id}',[InventoryController::class, 'delete']);
});

Route::prefix('outgoing')->group(function(){
    Route::get('/',[OutgoingController::class, 'index'])->name('outgoing');
    Route::get('/create',[OutgoingController::class, 'create'])->name('outgoing.create');
    Route::post('/',[OutgoingController::class, 'store'])->name('outgoing.store');
    Route::post('/{id}',[OutgoingController::class, 'update'])->name('outgoing.update');
    Route::get('/{id}',[OutgoingController::class, 'edit'])->name('outgoing.edit');
    Route::get('/delete/{id}',[OutgoingController::class, 'delete']);
});

Route::prefix('user')->group(function(){
    Route::get('/',[UserController::class, 'index'])->name('user');
    Route::get('/create',[UserController::class, 'create'])->name('user.create');
    Route::post('/',[UserController::class, 'store'])->name('user.store');
    Route::post('/{id}',[UserController::class, 'update'])->name('user.update');
    Route::get('/{id}',[UserController::class, 'edit'])->name('user.edit');
    Route::get('/delete/{id}',[UserController::class, 'delete']);
});

});
