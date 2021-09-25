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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('index');
Route::get('/registration', 'IndexController@registration')->name('registration');
//Route::get('/orders', 'CategoryController@orders')->name('orders');
//Route::get('/product', 'ProductController@product')->name('product');

Route::get('/buy', 'BuyController@buy')->name('buy');
Route::post('/buy','BuyController@sell')->name('sell');
Route::get('/successful','SuccessfulController@successful')->name('successful');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin','AdminController@admin')->name('admin');

    Route::get('/admin/successful',function (){
        return view('admin/successful');
    })->name('successfulAdmin');

    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
