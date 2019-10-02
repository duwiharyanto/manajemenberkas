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
//     return view('welcome');
// });
Route::get('/','frontend@cariberkas');
Route::group(['middleware'=>['ceklogin']],function(){
	Route::resource('Berkas','berkas');
	Route::resource('User','user');	
});


Route::get('Login','login@index');
Route::post('Login/auth','login@auth')->name('Login.auth');
Route::get('Logout','login@logout');
Route::get('Cariberkas','frontend@cariberkas');
Route::post('Cariberkas/store','frontend@store');
