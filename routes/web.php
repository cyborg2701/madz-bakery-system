<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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



Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/home', [HomeController::class, 'index'])->name('user.home')->middleware('is_user');
Route::post('/home', [HomeController::class, 'saveTransaction'])->name('saveTransaction')->middleware('is_user');

Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function(){
    // product controller
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    Route::post('product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('product/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::delete('product/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::delete('product/optimize', [ProductController::class, 'optimize']);
    // category controller
    Route::get('category', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');


   
});
Auth::routes();
