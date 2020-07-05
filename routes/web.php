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

// Route::get('/', function () {
//     return view('layouts.master');
// });
Route::get('/auth', 'Auth\LoginController@index'); // menampilkan halaman form login
Route::post('/auth', 'Auth\LoginController@store'); // post login
Route::get('/logout', 'Auth\LoginController@logout'); // keluar

Route::get('/', 'ArtikelController@index'); //halaman index, master
Route::get('/artikel', 'ArtikelController@all_artikel'); // menampilkan tabel berisi data artikel-artikel
Route::get('/artikel/create', 'ArtikelController@create'); // menampilkan form untuk membuat artikel baru
Route::post('/artikel', 'ArtikelController@store'); // menyimpan artikel baru
Route::get('artikel/{id}', 'ArtikelController@show'); // menampilkan detail item dengan id 
Route::get('/artikel/{id}/edit', 'ArtikelController@edit'); // menampilkan form untuk edit item
Route::put('/artikel/{id}', 'ArtikelController@update'); // menyimpan perubahan dari form edit
Route::delete('/artikel/{id}', 'ArtikelController@destroy'); // menghapus data dengan id