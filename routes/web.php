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

// Antennas Controller
Route::resource('antennas', 'AntennasController');
Route::get('/antennasList', 'AntennasController@index');
Route::get('/antennasList/pick', 'AntennasController@pickAntennas');

// Band Controller
Route::resource('bands', 'XgBandsController');

// Analyser Controller
Route::get('/', 'AnalyserController@index');
Route::get('/result', 'AnalyserController@showResult');
Route::get('/edit', 'AnalyserController@editForm');
Route::get(
    '/AnalyseConfig/Conf={confNb}/Ids={antennasSetIds}'
        . '/Tech={technology}/Pr={port}/Bd={band}'
        . '/Sec={antenna_per_sector}/Pfd={antenna_preferred}/Het/{max_height?}',
    'AnalyserController@AnalyseConfig'
);
Route::get(
    '/AnalyseConfig/Pick/',
    'AnalyserController@analyseConfigHelper'
);

// SettingWebLara Controller
Route::get('/setting', 'SettingWebLaraController@index')->name("settingWeb");
Route::post('/setting', 'SettingWebLaraController@store')->name("settingWebStore");
Route::get(
    '/provideAntennasData',
    'SettingWebLaraController@triggerUpdateProvidedData'
)->name("settingTriggerUpdate");
Route::delete('/setting', 'SettingWebLaraController@clearCachedResult');

Route::get(
    '/QueryLog',
    'SettingWebLaraController@getQueriesLog'
)->name("QueryLog");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get(
    '/updateDatabaseByGetCron',
    'SettingWebLaraController@updateDatabaseByGetCron'
);
