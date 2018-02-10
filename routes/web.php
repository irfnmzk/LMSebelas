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

Route::get('/', function () {
    return redirect('login');
});
Route::get('/kelas', function () {
    return view('kelas.show');
});


Auth::routes();

//Disable sementara untuk register
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/classroom', 'KelasController@index')->name('kelas.index');

Route::get('/user/setting','UserController@showSetting');
Route::get('/user/profile','UserController@showProfile');

Route::post('/user/setting', 'UserController@storeSetting')->name('setting.store');
Route::get('/sekolah/find', 'UserController@find');
Route::post('/classroom/add', 'kelasController@storeKelas')->name('kelas.store');
Route::post('/classroom/join', 'kelasController@joinKelas')->name('kelas.join');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('callback/{provider}', 'Auth\LoginController@handleProviderCallback');