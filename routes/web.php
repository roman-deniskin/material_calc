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
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/unit', 'UnitController@index')->name('unit');
Route::post('unit', 'UnitController@post')->name('unit_post');

Route::get('/material', 'MaterialController@index')->name('material');
Route::post('material', 'MaterialController@post')->name('material_post');

Route::get('/detail', 'DetailController@index')->name('detail');
Route::post('detail', 'DetailController@post')->name('detail_post');

