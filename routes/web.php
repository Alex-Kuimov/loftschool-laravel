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
Route::get('/orders', 'CategoryController@orders')->name('orders');
Route::get('/product', 'ProductController@product')->name('product');
Route::get('/buy', 'BuyController@buy')->name('buy');
Route::post('/buy','BuyController@sell')->name('sell');
Route::get('/successful','SuccessfulController@successful')->name('successful');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin','AdminController@admin')->name('admin');
    Route::get('/createCategory','CreateCategoryController@createCategory')->name('createCategory');
    Route::post('/createCategory','CreateCategoryController@createCategory')->name('changeCategory');

    Route::get('/admin/successful',function (){
        return view('admin/successful');
    })->name('successfulAdmin');

    Route::get('/createProduct','CreateProductController@createProduct')->name('createProduct');
    Route::post('/createProduct','CreateProductController@createProduct')->name('changeProduct');
    Route::get('/editCategory','EditCategoryController@editCategory')->name('editCategory');
    Route::get('/editSelectCategory','EditSelectCategoryController@editSelectCategory')->name('editSelectCategory');
    Route::post('/editSelectCategory','EditSelectCategoryController@editSelectCategory')->name('updateSelectCategory');
    Route::get('/editProduct','EditProductController@editProduct')->name('editProduct');
    Route::get('/editSelectProduct','EditSelectProductController@editSelectProduct')->name('editSelectProduct');
    Route::post('/editSelectProduct','EditSelectProductController@editSelectProduct')->name('updateSelectProduct');
    Route::get('/deleteCategory','DeleteCategoryController@deleteCategory')->name('deleteCategory');
    Route::post('/deleteCategory','DeleteCategoryController@deleteCategory')->name('confirmCategory');
    Route::get('/deleteProduct','DeleteProductController@deleteProduct')->name('deleteProduct');
    Route::post('/deleteProduct','DeleteProductController@deleteProduct')->name('confirmProduct');
    Route::get('/allOrders','AllOrdersController@allOrders')->name('allOrders');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
