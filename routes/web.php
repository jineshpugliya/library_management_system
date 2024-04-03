<?php

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
    return view('/welcome');
});
// Route::get('/header', function () {
//     return view('layouts/header');
// });

 Route::resource('category', 'CategoryController');

 Route::resource('subcategory', 'SubCategoryController');

 Route::resource('book', 'BookController');

 Route::resource('student', 'StudentController');

 Route::resource('teacher', 'TeacherController');

 Route::get('stock/show/{id}','BookController@show');

 Route::post('stock/{id}', 'BookController@stock');

 Route::get('stock/list', 'BookController@stocklist');

 Route::get('stock/edit/{id}','BookController@stockedit');

 Route::post('stock/update/{id}', 'BookController@stockupdate');

 Route::post('stock/delete/{id}', 'BookController@stockdestroy');


 //Route::resource('stock', 'StockController');

// Route::get('book/create','BookController@create');

// Route::get('book/list', 'BookController@index');

// Route::post('book/submit', 'BookController@store');

// Route::post('book/delete/{id}', 'BookController@destroy');

// Route::post('book/edit/{id}', 'BookController@edit');

// Route::post('book/update/{id}', 'BookController@update');

Auth::routes();
Route::get('category/{category}/subcategory', 'bookController@getSubCategory');
Route::get('/home', 'HomeController@index')->name('home');