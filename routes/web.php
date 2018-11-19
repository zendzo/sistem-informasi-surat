<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Administrator Sections
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'administrator'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Admin\AdministratorController@index'
	]);

	Route::resource('role', 'Admin\RoleController');

	Route::resource('user', 'UserController');
	
	Route::resource('type-surat', 'SuratTypeController');

	Route::get('/application-menus',[
		'as'	=>	'app.menu',
		'uses'	=>	'Admin\MenuController@index'
	]);
});

Auth::routes();
// Surat
Route::get('surat/masuk', 'SuratController@inbox')->name('surat.masuk')->middleware('auth');
Route::get('surat/keluar', 'SuratController@sent')->name('surat.keluar')->middleware('auth');
Route::get('surat/show/{surat}', 'SuratController@show')->name('surat.show')->middleware('auth');
Route::get('surat/kirim', 'SuratController@create')->name('surat.create')->middleware('auth');
Route::post('surat', 'SuratController@store')->name('surat.store')->middleware('auth');

Route::get('disposisi/masuk', 'DisposisiController@inbox')->name('disposisi.masuk')->middleware('auth');
Route::get('disposisi/keluar', 'DisposisiController@sent')->name('disposisi.keluar')->middleware('auth');
Route::get('disposisi/show/{disposisi}', 'DisposisiController@show')->name('disposisi.show')->middleware('auth');
Route::get('disposisi/kirim', 'DisposisiController@create')->name('disposisi.create')->middleware('auth');
Route::post('disposisi', 'DisposisiController@store')->name('disposisi.store')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
