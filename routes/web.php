<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    Route::post('store', [ProductController::class, 'store'])->name('admin.store');
    Route::delete('destroy', [ProductController::class, 'destroy'])->name('admin.destroy');
});
Auth::routes();
