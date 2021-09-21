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
Route::get('/admin','AdminController@admin')->name('admin')->middleware('admin');
Route::get('/createCategory','CreateCategoryController@createCategory')->name('createCategory')->middleware('admin');
Route::post('/createCategory','CreateCategoryController@createCategory')->name('changeCategory')->middleware('admin');
Route::get('/admin/successful',function (){
    return view('admin/successful');
})->name('successfulAdmin')->middleware('admin');
Route::get('/createProduct','CreateProductController@createProduct')->name('createProduct')->middleware('admin');
Route::post('/createProduct','CreateProductController@createProduct')->name('changeProduct')->middleware('admin');
Route::get('/editCategory','EditCategoryController@editCategory')->name('editCategory')->middleware('admin');
Route::get('/editSelectCategory','EditSelectCategoryController@editSelectCategory')->name('editSelectCategory')->middleware('admin');
Route::post('/editSelectCategory','EditSelectCategoryController@editSelectCategory')->name('updateSelectCategory')->middleware('admin');
Route::get('/editProduct','EditProductController@editProduct')->name('editProduct')->middleware('admin');
Route::get('/editSelectProduct','EditSelectProductController@editSelectProduct')->name('editSelectProduct')->middleware('admin');
Route::post('/editSelectProduct','EditSelectProductController@editSelectProduct')->name('updateSelectProduct')->middleware('admin');
Route::get('/deleteCategory','DeleteCategoryController@deleteCategory')->name('deleteCategory')->middleware('admin');
Route::post('/deleteCategory','DeleteCategoryController@deleteCategory')->name('confirmCategory')->middleware('admin');
Route::get('/deleteProduct','DeleteProductController@deleteProduct')->name('deleteProduct')->middleware('admin');
Route::post('/deleteProduct','DeleteProductController@deleteProduct')->name('confirmProduct')->middleware('admin');
Route::get('/allOrders','AllOrdersController@allOrders')->name('allOrders')->middleware('admin');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
