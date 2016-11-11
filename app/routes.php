<?php

Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@login');

Route::group(array('before'=>'auth1'), function(){

	Route::get('logout', 'HomeController@logout');

	Route::get('kategorije', 'KategorijaController@adminK');
	Route::get('kategorije/details/{id}', 'KategorijaController@adminKdetails');
	Route::get('kategorije/delete/{id}', 'KategorijaController@adminKdelete');
	Route::get('kategorije/edit/{id}', 'KategorijaController@adminKedit');
	Route::post('kategorije/edit/{id}', 'KategorijaController@adminKedit');
	Route::get('kategorije/create', 'KategorijaController@adminKnew');
	Route::post('kategorije/create', 'KategorijaController@adminKnew');

	Route::get('sefovi', 'SefController@adminS');
	Route::get('sefovi/details/{id}', 'SefController@adminSdetails');
	Route::get('sefovi/delete/{id}', 'SefController@adminSdelete');
	Route::get('sefovi/edit/{id}', 'SefController@adminSedit');
	Route::post('sefovi/edit/{id}', 'SefController@adminSedit');
	Route::get('sefovi/create', 'SefController@adminSnew');
	Route::post('sefovi/create', 'SefController@adminSnew');
});