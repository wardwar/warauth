<?php namespace Wardwar\warauth\Facades;

use Illuminate\Support\Facades\Facade;

class Warauth extends Facade {

	protected static function getFacadeAccessor() {
		return 'warauth';
	}
}