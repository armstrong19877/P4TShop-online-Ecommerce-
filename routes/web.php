<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\UsersController;

use App\Http\Middleware\CheckingUserRole;
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
    return view('frontend.users.index');
});

Route::get('/', function () {
    return view('/frontend.users.index');
})->name('dashboard');




//admin
//Route::get('/admin', [AdminController::class, 'index'])->middleware('role:admin');

    Route::get('admin', [AdminController::class, 'index'])->middleware('role:admin');
    //category route
    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::get('/admin/category/create', [CategoryController::class, 'create']);
    Route::post('admin/category/store', [CategoryController::class, 'store']);
    Route::get('admin/category/{id}/view', [CategoryController::class, 'view']);
    Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::patch('admin/category/{id}/update', [CategoryController::class, 'update']);
    Route::delete('admin/category/{id}/delete', [CategoryController::class, 'destroy']);

    //product route

/*
    Route::group([
        'prefix' => '/admin',
        'as' => 'admin.',
      ], function () {
        // All routes go here
      });
      */

    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/product/create', [ProductController::class, 'create']);
    Route::post('admin/product/store', [ProductController::class, 'store']);
    Route::get('admin/product/{id}/view', [ProductController::class, 'view']);
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('admin/product/{id}/update', [ProductController::class, 'update']);
    Route::delete('admin/product/{id}/delete', [ProductController::class, 'destroy']);




    //cart controllers

    Route::get('/', [CartController::class, 'display_products']);



    Route::get('item/{id}', [CartController::class, 'product']);

    Route::get('add-to-cart/{id}', [CartController::class, 'productAddToCart']);

    Route::get('checkout', [CartController::class, 'checkout']);

    Route::get('cart', [CartController::class, 'cart']);

    Route::patch('update-cart', [CartController::class, 'update']);

    Route::patch('update-product-cart', [CartController::class, 'update_product_cart']);

    Route::delete('remove-from-cart', [CartController::class, 'remove']);


    require __DIR__.'/auth.php';

    //user controller

    Route::post('checkout', [UsersController::class, 'store_order'])->name('checkout.store');
    
    Route::post('pay', [UsersController::class, 'pay'])->name('payment');

    Route::get('success', [UsersController::class, 'success']);

    Route::get('error', [UsersController::class, 'error']);
    