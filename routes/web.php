<?php

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

Route::get('/', 'Mainpage@index');

Route::get('/pets', 'PetListController@getList');
Route::get('/locale/set/{localeCode}', 'LocaleController@setLocale');

Route::get('/characters', 'CharacterController@getAll');
Route::post('/character', 'CharacterController@create');
Route::put('/character', 'CharacterController@update');
Route::delete('/character', 'CharacterController@delete');

Route::post('/pet/mark/discovered', 'PetListController@markDiscovered');
Route::post('/pet/mark/found', 'PetListController@markFound');