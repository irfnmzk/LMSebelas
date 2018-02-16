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

Route::get('/pdfku/{link}', function ($link){
    //dd(asset('pdf/pdf.pdf'));
    return response()->file(public_path().'/pdf/'.$link);
});

Auth::routes();

// Disable sementara untuk register
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/classroom', 'KelasController@index')->name('kelas.index');

// User area
Route::get('/user/setting','UserController@showSetting');
Route::get('/user/profile','UserController@showProfile');
Route::post('/user/setting', 'UserController@storeSetting')->name('setting.store');
Route::get('/user/profile/edit', 'UserController@editProfile');
Route::post('/user/profile/edit', 'UserController@updateProfile')->name('profile.update');


// Ajax
Route::get('/sekolah/find', 'UserController@find');

// Class area
Route::get('/classroom/{id}', 'kelasController@showKelas')->name('show.kelas');
Route::post('/classroom/add', 'kelasController@storeKelas')->name('kelas.store');
Route::post('/classroom/join', 'kelasController@joinKelas')->name('kelas.join');
Route::post('/classroom/add_material', 'kelasController@storeMateri')->name('materi.store');
Route::post('/classroom/add_modul', 'kelasController@storeModul')->name('modul.store');

// Social Login
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('callback/{provider}', 'Auth\LoginController@handleProviderCallback');