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

Route::get('/', 'SignatureController@home');
Route::post('/create', 'SignatureController@create');
Route::get('/edit/{id}', 'SignatureController@edit');
Route::post('/edit/{id}', 'SignatureController@update');
Route::get('/delete/{id}', 'SignatureController@delete');
Route::get('/edit/{id}/preview', 'SignatureController@preview');

