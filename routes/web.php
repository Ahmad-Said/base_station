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

// Route::get('/', 'Auth\LoginController@showLoginForm');


// Pages controller
Route::get('showfile/{file}', 'PagesController@showfile');
Route::get('/test', 'PagesController@test');
Route::get('/about', 'PagesController@about');
Route::post('/about', 'PagesController@storeAbout');
Route::get('/references', 'PagesController@references');

// Profile Controller
Route::resource('profile', 'ProfileController');

// Post Controller
Route::resource('posts', 'PostsController');

// Band Controller
Route::resource('bands', 'XgBandsController');

// Analyser Controller
Route::get('/', 'AnalyserController@index');
Route::get('/result', 'AnalyserController@showResult');
Route::get('/edit', 'AnalyserController@editForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
