<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/registration', 'IndexController@registration')->name('registration');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/successful','SuccessfulController@successful')->name('successful');

Route::resource('order', 'OrderController');
Route::resource('product', 'ProductController');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin','AdminController@admin')->name('admin');

    Route::get('/admin/successful',function (){
        return view('admin/successful');
    })->name('successfulAdmin');

    Route::resource('/admin/product', 'AdminProductController');
    Route::resource('/admin/category', 'AdminCategoryController');
    Route::resource('/admin/order', 'AdminOrderController');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
