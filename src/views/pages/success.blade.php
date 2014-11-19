@extends('warauth::layouts.master')

@section('title')
@parent - Register Success
@stop


@section('section')
	{{ Session::get('register') }}
@stop