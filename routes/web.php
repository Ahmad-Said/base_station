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

// Pages controller
Route::get('showfile/{file}', 'PagesController@showfile');
Route::get('/test', 'PagesController@test');
Route::get('/about', 'PagesController@about');
Route::get('/references', 'PagesController@references');

// Profile Controller
Route::resource('profile', 'ProfileController');

// Analyser Controller
Route::get('/', 'AnalyserController@index');
Route::post('/', 'AnalyserController@showResult');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
