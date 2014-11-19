<?php 

class AuthController extends BaseController {

	public function register() 
	{
		return View::make('warauth::pages.register');
	}

	public function login()
	{
		return View::make('warauth::pages.login');
	}

	public function postRegister()
	{
		$rules = array(
			'username' => 'required|min:6|unique:user_login',
			'email' => 'required|email|unique:user_login',
			'password' => 'required|min:6',
			'passwordConfirmation' => 'required|same:password'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		Warauth::registerUser(Input::all());
		return Redirect::route('success');

	}

	public function postLogin()
	{

	}

	public function confirm($confirmation_code)
	{
		if(! $confirmation_code)
		{
			throw new InvalidConfirmationCodeException;
		}

		$user = New User;
		$user = User::whereConfirmationCode($confirmation_code)->first();

		if(! $user)
		{
			throw new InvalidConfirmationCodeException;
		}

		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();

		Session::flash('register','Akun anda sudah terverifikasi');

		return Redirect::route('/');
	}

}