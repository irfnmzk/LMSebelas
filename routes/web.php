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
Route::get('/classroom/edit/{id}', 'kelasController@editKelas')->name('kelas.edit');
Route::post('/classroom/edit/{id}', 'kelasController@updateKelas')->name('kelas.update');
Route::post('/classroom/join', 'kelasController@joinKelas')->name('kelas.join');
Route::post('/classroom/add_material', 'kelasController@storeMateri')->name('materi.store');
Route::post('/classroom/add_modul', 'kelasController@storeModul')->name('modul.store');
Route::post('/classroom/add_tugas', 'TugasController@store')->name('tugas.store');
Route::get('/task/{id}', 'TugasController@show')->name('tugas.show');
Route::get('/task_result/{id}', 'TugasController@result')->name('task.result');
Route::post('/classroom/add_quiz', 'QuizController@store')->name('quiz.store');
Route::get('task/download/{id}', 'TugasController@download')->name('task.download');

Route::get('/start_quiz/{id}', 'QuizController@start_quiz');
Route::post('/store/tugas', 'TugasController@storeSiswa')->name('siswa.tugas.store');
Route::get('/quiz_control/{id}', 'QuizController@quiz_control');
Route::get('/delete_quiz/{id}', 'QuizController@destroy');
Route::post('/add_question/', 'QuizController@storeQuestion')->name('question.store');;
Route::post('/edit_question/{id}', 'QuizController@update_question');
Route::get('/delete_question/{id}', 'QuizController@destroy_question');
Route::post('/saveanswerquiz', 'QuizController@saveanswerquiz');
Route::post('/checkquiz', 'QuizController@checkquiz');
Route::post('/stopquiz', 'QuizController@stopquiz');
Route::get('/quiz_result_all/{id}', 'QuizController@result_all');
Route::get('/quiz_result_excel/{id}', 'QuizController@quiz_result_excel');

Route::post('/diskusi/add/{id}', 'DiskusiController@store')->name('diskusi.store');

// Social Login
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('callback/{provider}', 'Auth\LoginController@handleProviderCallback');