<?php

/*
|Route from warauth package
|===========================================
|group 'before => guest' is define a user
|is't logged in
|===========================================
*/

Route::group([
	'before' => 'guest'], 
	function() {

/*
|Register Page
|===========================================
|input some data for information account
|===========================================
*/

Route::get('register', [
	'as'=> 'register',
	'uses' => 'AuthController@register'
	]
);

/*
|Login Page
|===========================================
|Page that logging user
|===========================================
*/

Route::get('login', [
	'as'=> 'login', 
	'uses' => 'AuthController@login'
	]
);

/*
|Verify Route
|===========================================
|Verify the account from link, that before
|was sent to user's email
|===========================================
*/
Route::get('register/verify/{confirmationCode}',[
	'as' => 'confirmation_path',
	'uses' => 'AuthController@confirm'
]);

/*
|Success Page
|===========================================
|This page has display flash message from 
|registering
|===========================================
*/

Route::get('success',[
	'as' => 'success' ,
	function()
	{
		return View::make('warauth::pages.success');
	}

	]
);

/*
|csrf group
|===========================================
|csrf security for bruto force sign
|===========================================
*/

Route::group([
	'before' => 'csrf'], 
	function() {

/*
|post register
|===========================================
|Post the register data
|===========================================
*/

Route::post('register', [
	'uses' => 'AuthController@postRegister']
);

/*
|post login
|===========================================
|Authentication data logging
|===========================================
*/

Route::post('login', [
	'uses' => 'AuthController@postLogin']
);


	}); // end group csrf
}); // end group guest
