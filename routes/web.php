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

Route::get('auth-user',function(){
    return \Auth::user();
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'user:admin'], function(){
        Route::get('/pegawai', 'MainController@pegawai')->name('pegawai.list');
        Route::get('/pegawai/create','MainController@createPegawai')->name('pegawai.create');
        Route::get('/divisi', 'MainController@divisi')->name('divisi.list');
        Route::get('/divisi/create','MainController@createDivisi')->name('divisi.create');
        Route::post('/divisi','PegawaiController@createPegawai')->name('pegawai.create.post');
    });
    Route::group(['middleware' => 'user:employee'], function(){
        Route::get('/absen','MainController@absen')->name('absen');
    });
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::get('/', 'MainController@index')->name('index');
Route::post('/login', 'AuthController@login')->name('login')->middleware('guest');
