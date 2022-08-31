<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CashoutController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\PayableController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CashController;


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
    return view('auth/login');
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


    // cashout controller
    Route::get('expense', [CashoutController::class, 'index'])->name('admin.expense');
    Route::get('expense/edit', [CashoutController::class, 'edit'])->name('admin.expense.edit');
    Route::post('expense/store', [CashoutController::class, 'store'])->name('admin.expense.store');
    Route::delete('expense/destroy', [CashoutController::class, 'destroy'])->name('admin.expense.destroy');

    // expenditure Controller
    Route::get('expenditures', [ExpenditureController::class, 'index'])->name('admin.expenditures');
    Route::post('expenditures/store', [ExpenditureController::class, 'store'])->name('admin.expenditure.store');
    Route::get('expenditures/edit', [ExpenditureController::class, 'edit'])->name('admin.expenditure.edit');
    Route::delete('expenditures/destroy', [ExpenditureController::class, 'destroy'])->name('admin.expenditure.destroy');

    // account payable Controller
    Route::get('payable', [PayableController::class, 'index'])->name('admin.payables');
    Route::post('payable/store', [PayableController::class, 'store'])->name('admin.payable.store');
    Route::get('payable/edit', [PayableController::class, 'edit'])->name('admin.payable.edit');
    Route::delete('payable/destroy', [PayableController::class, 'destroy'])->name('admin.payable.destroy');


    // sales Controller
    Route::get('sales', [SalesController::class, 'index'])->name('admin.sales.daily');
    Route::get('sales/weekly', [SalesController::class, 'weeklySales'])->name('admin.sales.weekly');
    Route::get('sales/monthly', [SalesController::class, 'monthlySales'])->name('admin.sales.monthly');
    Route::get('transactions', [SalesController::class, 'transaction'])->name('admin.transaction');

       // cashController
    Route::get('cash', [CashController::class, 'index'])->name('admin.cash');
    Route::post('cash/store', [CashController::class, 'store'])->name('admin.cash.store');


});
Auth::routes();
