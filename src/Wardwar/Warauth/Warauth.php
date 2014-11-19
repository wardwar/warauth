<?php namespace Wardwar\warauth;

class Warauth {

	public static function registerUser($input) {

		$confirmation_code = str_random(30);

		$input = (object) $input;
		$user = new \User;
		$user->role = '5';
		$user->username = $input->username;
		$user->email = $input->email;
		$user->password = \Hash::make($input->password);
		$user->confirmation_code = $confirmation_code;
		$user->save();

		$profile = new \UserProfile;
		$profile->id_user = $user->id;
		$profile->save();       

		\Mail::send('warauth::emails.verify.verify', ['confirmation_code' => $confirmation_code], function($message) use ($user) 
		{
			$message->to($user->email, $user->username)
					->subject('verification your email address');
		});

		\Session::flash('register','Thanks for sign up to squidrop please check your email addres<br/>for verification your account.');
	}
}