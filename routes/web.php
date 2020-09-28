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


// Login Control
Route::get('/login', 'LoginController@loginView')->name('login');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
Route::get('/forgot_password', 'LoginController@forgotView');

// Pimpinan Divisi and Direktur
Route::group(['middleware' => ['auth', 'otoritas:1,2']], function(){
    // Dashboard 
    Route::get('/home', 'PagesController@home');

    // Profile
    Route::get('/user/profile/{id}', 'UserController@edit');
    Route::put('/user/profile/{id}', 'UserController@update');
});

// Direktur
Route::group(['middleware' => ['auth', 'otoritas:1']], function(){
    // Perizinan
    Route::get('/perizinan', 'PerizinanController@index');
    Route::post('/perizinan/{id}', 'PerizinanController@perizinanCuti');
    // Route::post('/pengajuan/cuti/cetak/{id}', 'PengajuanController@cetakPengajuan');
});

// Pimpinan Divisi
Route::group(['middleware' => ['auth', 'otoritas:2']], function(){
    // User
    Route::get('/user', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::put('/user/ubahstatus/{id}', 'UserController@ubahStatus');

    // Pegawai
    Route::get('/pegawai', 'PegawaiController@index');
    Route::post('/pegawai', 'PegawaiController@store');
    Route::get('/pegawai/datapegawai', 'PegawaiController@getDataPegawai');
    Route::get('/pegawai/{id}', 'PegawaiController@show');
    Route::get('/pegawai/{id}/edit', 'PegawaiController@edit');
    Route::delete('/pegawai/{id}', 'PegawaiController@delete');
    Route::put('/pegawai/{id}/edit', 'PegawaiController@update');

    // Cuti
    Route::get('/cuti', 'CutiController@index');
    Route::get('/cuti/laporan/disetujui', 'CutiController@laporanDisetujui');
    Route::get('/cuti/laporan/tidakdisetujui', 'CutiController@laporanTidakDisetujui');
    Route::get('/cuti/{id}', 'CutiController@show');
    Route::get('/cuti/{id}/edit', 'CutiController@index');
    Route::delete('/cuti/{id}', 'CutiController@delete');
    Route::put('/cuti/{id}/edit', 'CutiController@update');

});

// Pegawai
Route::group(['middleware' => ['auth', 'otoritas:3,4,5']], function(){
    // Pengajuan 1
    Route::get('/pengajuan', 'CutiController@create')->name('pengajuan');
    Route::post('/pengajuan', 'CutiController@store');
    Route::get('/pengajuan/selesai', 'CutiController@pengajuanSelesai')->name('pengajuan');
    
    // Pengajuan 2
    Route::get('/pengajuan/cuti', 'PengajuanController@home');
    Route::get('/pengajuan/cuti/form', 'PengajuanController@form');
    Route::get('/pengajuan/cuti/selesai', 'PengajuanController@selesai');
    Route::post('/pengajuan/cuti', 'PengajuanController@pengajuan');
    Route::get('/pengajuan/cuti/lihat', 'PengajuanController@lihatPengajuan');
    // Route::post('/pengajuan/cuti/cetak/{id}', 'PengajuanController@cetakPengajuan');
    Route::put('/pengajuan/cuti/stop/{id}', 'PengajuanController@selesaiCuti');

    // Profile
    Route::get('/profile/front/{id}', 'PagesController@profile');

});

Route::group(['middleware' => ['auth', 'otoritas:1,3,4,5']], function(){
    // Cetak
    Route::post('/pengajuan/cuti/cetak/{id}', 'PengajuanController@cetakPengajuan');
});


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
