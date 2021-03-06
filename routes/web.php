<?php

Route::get('/','FrontendController@index');
Route::get('/autor','FrontendController@autor');
Route::get('/galerija','FrontendController@galerija');
Route::get('/search', 'FrontendController@search')->name('search');

Route::group(['middleware' => 'admin'], function() {


	// Upravljanje korisnicima

	Route::get('/users/{id?}', 'KorisnikController@show');
	Route::post('/users/store', 'KorisnikController@store');
	Route::get('/logs', 'FrontendController@showlogs');
	Route::get('/flogs', 'DateRangeController@index');
	Route::post('/users/update/{id}','KorisnikController@update');
	Route::get('/users/destroy/{id}','KorisnikController@destroy');
});

Route::get('contact-us','ContactUsController@index');
Route::post('contact-us','ContactUsController@handleForm');


Route::get('/posts/{id?}', 'PostController@postshow')->middleware("user");
Route::post('/posts/store', 'PostController@store');
Route::put('/posts/update/{id}','PostController@update');
Route::get('/posts/destroy/{id}','PostController@destroy');


// Upravljanje ulogama

Route::get('/roles/{id?}', 'UlogaController@show');
Route::post('/roles/store', 'UlogaController@store');
Route::post('/roles/update/{id}','UlogaController@update');
Route::get('/roles/destroy/{id}','UlogaController@destroy');

// Logovanje

Route::post('/login', 'LoginController@login')->name('login');
Route::get('/register', 'KorisnikController@regshow');
Route::post('/register/store', 'KorisnikController@regstore');

Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/post/{id}','FrontendController@getPost');

/*
    Rute za upravljanje komentarima
*/
Route::post("/comments/{postId}", "CommentsController@postComment")->name("postComment");
Route::post("/post/{postId}/comments/{commentId?}", "CommentsController@editComment")->name("editComment");
Route::get("/comments/{commentId}/delete", "CommentsController@deleteComment")->name("deleteComment");

Route::get('/download','FrontendController@download');

