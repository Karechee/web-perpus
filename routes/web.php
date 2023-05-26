<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route untuk Data Buku
Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah','BukuController@bukutambah');
Route::get('/buku/hapus/{id_buku}','BukuController@bukuhapus');
Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');

//Route untuk Data Buku
Route::get('/home', function(){return view('view_home');});

//Route untuk Data Member
Route::get('/member', 'MemberController@membertampil');
Route::post('/member/tambah', 'MemberController@membertambah');
Route::get('/member/hapus/{id_member}', 'MemberController@memberhapus');
Route::put('/member/edit/{id_member}', 'MemberController@memberedit');

//Route untuk Data Pengurus
Route::get('/pengurus', 'PengurusController@pengurustampil');
Route::post('/pengurus/tambah', 'PengurusController@pengurustambah');
Route::get('/pengurus/hapus/{id_pengurus}', 'PengurusController@pengurushapus');
Route::put('/pengurus/edit/{id_pengurus}', 'PengurusController@pengurusedit');