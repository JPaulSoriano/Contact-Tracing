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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);
// Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('grades','GradeController');
Route::resource('students','StudentController');
Route::get('/fetchers/{student}','FetcherController@create')->name('fetcherscreate');
Route::get('/fetchers/{fetcher}/show','FetcherController@show')->name('fetchersshow');
Route::post('/fetchers/{student}/store','FetcherController@store')->name('fetchersstore');
Route::get('/fetchers','FetcherController@index')->name('fetchersindex');
Route::get('/approve/{fetcher}', 'FetcherController@approve')->name('approve');
Route::get('/decline/{fetcher}', 'FetcherController@decline')->name('decline');
Route::get('/qrcode/{id}', 'QRController@generateQrCode');
Route::get('/verify/{fetcher}', 'FetcherController@verify')->name('verify');
Route::delete('/unverify/{fetcher}', 'FetcherController@unverify')->name('unverify');
