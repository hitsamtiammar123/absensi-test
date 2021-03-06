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
        Route::post('/pegawai','PegawaiController@createPegawai')->name('pegawai.create.post');
        Route::get('/pegawai/{id}/delete','PegawaiController@deletePegawai')->name('pegawai.delete');
        Route::get('/pegawai/{id}/update','MainController@updatePegawai')->name('pegawai.update');
        Route::post('/pegawai/{id}/update','PegawaiController@updatePegawai')->name('pegawai.update.post');

        Route::get('/divisi', 'MainController@divisi')->name('divisi.list');
        Route::get('/divisi/create','MainController@createDivisi')->name('divisi.create');
        Route::post('/divisi/{id}/update','DivisionController@updateDivision')->name('divisi.update.post');
        Route::get('/divisi/{id}/delete','DivisionController@deleteDivision')->name('divisi.delete');
        Route::get('/divisi/{id}/update','MainController@updateDivisi')->name('divisi.update');
        Route::post('/divisi','DivisionController@createDivision')->name('divisi.create.post');


    });
    Route::group(['middleware' => 'user:employee'], function(){
        Route::get('/absen','MainController@absen')->name('absen');
        Route::post('/absen/in','AbsenceController@absenceIn')->name('absen.in');
        Route::post('/absen/out','AbsenceController@absenceOut')->name('absen.out');
    });
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::get('/', 'MainController@index')->name('index');
Route::post('/login', 'AuthController@login')->name('login')->middleware('guest');
