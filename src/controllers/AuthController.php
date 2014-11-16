<?php 

class AuthController extends BaseController {

	public function register() 
	{
		return View::make('warauth::home');
	}
}