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
Route::get('/test', 'PagesController@test');
Route::get('/profile', 'PagesController@profile');
Route::post('/profile', 'PagesController@update');
Route::get('/profile/{a}', 'PagesController@otherProfile');
Route::get('showfile/{file}', 'PagesController@showfile');
Route::get('/about', 'PagesController@about');
Route::get('/references', 'PagesController@references');


// Analyser Controller
Route::get('/', 'AnalyserController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
