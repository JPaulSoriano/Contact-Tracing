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

// Auth::routes(['register' => false]);
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('students','StudentController');

Route::get('/fetchers/{guardian}','FetcherController@create')->name('fetcherscreate');
Route::post('/fetchers/{guardian}/store','FetcherController@store')->name('fetchersstore');

Route::get('/guardians/{student}','GuardianController@create')->name('guardianscreate');
Route::post('/guardians/{student}/store','GuardianController@store')->name('guardiansstore');

Route::get('/qrcode/{id}', 'QRController@generateQrCode');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('grades','GradeController');
    Route::get('/verify/{fetcher}', 'FetcherController@verify')->name('verify');
    Route::delete('/unverify/{fetcher}', 'FetcherController@unverify')->name('unverify');
    Route::get('/approve/{fetcher}', 'FetcherController@approve')->name('approve');
    Route::get('/decline/{fetcher}', 'FetcherController@decline')->name('decline');
    Route::get('/fetchers/{fetcher}/show','FetcherController@show')->name('fetchersshow');
    Route::get('/fetchers','FetcherController@index')->name('fetchersindex');
    Route::delete('/fetchers/{fetcher}','FetcherController@destroy')->name('fetchersdestroy');
});
