@extends('layouts.app',[
	'title' =>  Auth::user()->name
])

@section('title', 'Dashboard')

@section('content')

    <p class="govuk-body">Hi <strong class="govuk-!-font-weight-bold">{{ Auth::user()->name }}</strong>. Welcome to your
        homepage.</p>

@endsection
