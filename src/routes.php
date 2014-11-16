<?php

Route::group(array('before' => 'guest'), function() {
	Route::get('register', array('as'=> 'register', 'uses' => 'AuthController@register'));

	Route::group(array('before' => 'csrf'), function() {
		Route::post('register', array('uses' => 'AuthController@postRegister'));
	});
});
