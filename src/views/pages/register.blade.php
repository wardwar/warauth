@extends('warauth::layouts.master')

@section('title')
@parent - Register
@stop


@section('section')
	@foreach ($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
	{{Form::open()}}
		{{Form::text('username',null,array('placeholder' => 'Username'))}}
		{{Form::email('email',null,array('placeholder' => 'email'))}}
		{{Form::password('password',array('placeholder' => 'Password'))}}
		{{Form::password('passwordConfirmation',array('placeholder' => 'Password Confirmation'))}}
		{{Form::submit('Submit')}}
	{{Form::close()}}
@stop