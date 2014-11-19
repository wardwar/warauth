@extends('warauth::layouts.master')

@section('title')
@parent - Verify your email address
@stop


@section('section')
        <div>
            Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address
            <a href="{{URL::to('register/verify/' . $confirmation_code)}}">{{URL::to('register/verify/' . $confirmation_code)}}</a>
        </div>
@stop