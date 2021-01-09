@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to {{config('app.name')}}</h1>
            <p class="lead">A Laravel-driven Library Management App</p>
            <hr class="my-4">
            <p>Sign up today! It's completely free!</p>
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
        </div>
    </div>    
@endsection