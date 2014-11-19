@extends('warauth::layouts.master')

@section('title')
@parent - Login
@stop


@section('section')
	@foreach ($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
	{{Form::open()}}
		{{Form::text('username',null,array('placeholder' => 'Username'))}}
		{{Form::password('password',array('placeholder' => 'password'))}}
		{{Form::submit('Submit')}}
	{{Form::close()}}
@stop