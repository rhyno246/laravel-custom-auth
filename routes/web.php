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

Route::post('/login', [
    'as' => 'login.auth',
    'uses' => 'App\Http\Controllers\CustommerController@loginAuth',
]);

Route::post('/register', [
    'as' => 'register.auth',
    'uses' => 'App\Http\Controllers\CustommerController@registerAuth',
]);

Route::get('/contacts', [
    'as' => 'contatcs.index',
    'uses' => 'App\Http\Controllers\ContactsController@index',
]);

Route::get('/country', [
    'as' => 'country.index',
    'uses' => 'App\Http\Controllers\OrderController@index',
]);


Route::get('/chart', [
    'as' => 'chart.index',
    'uses' => 'App\Http\Controllers\ChartController@index',
]);




Route::post('/contacts', [
    'as' => 'contatcs',
    'uses' => 'App\Http\Controllers\ContactsController@sendMessage',
]);


Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'App\Http\Controllers\CustommerController@logout',
]);


Route::get('/forgot-password', [
    'as' => 'forgot',
    'uses' => 'App\Http\Controllers\CustommerController@forgot',
]);
Route::post('/forgot-password', [
    'as' => 'forgot',
    'uses' => 'App\Http\Controllers\CustommerController@forgotPost',
]);

Route::post('/reset-password', [
    'as' => 'reset.token',
    'uses' => 'App\Http\Controllers\CustommerController@resetPost',
]);

Route::get('/reset-password/{token}', [
    'as' => 'reset',
    'uses' => 'App\Http\Controllers\CustommerController@reset',
]);


Route::group(['middleware' => ['alreadyLogin']], function() {
    Route::get('/login', 'App\Http\Controllers\CustommerController@login')->name('login');
    Route::get('/register', 'App\Http\Controllers\CustommerController@register')->name('register');
});



Route::group(['middleware' => ['isLogin']], function() {
    Route::get('/', 'App\Http\Controllers\CustommerController@welcome')->name('welcome');
});




