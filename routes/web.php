<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master/{page}/{id}', 'MasterController@index')->name('master');
Route::post('/post_master/{page}/{id}', 'MasterController@index_post')->name('master_post');

Route::get('/banner/{page}/{id}', 'BannerController@index')->name('banner');
Route::post('/post_banner/{page}/{id}', 'BannerController@index_post')->name('banner_post');

	
