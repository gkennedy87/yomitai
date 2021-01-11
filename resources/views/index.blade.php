@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to {{config('app.name')}}</h1>
            <p class="lead">A Laravel-driven Library Management App</p>
            <hr class="my-4">
            <h3>Sign up today! It's completely free!</h3>
            <a class="btn btn-primary btn-lg mb-3" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
            <div class="d-flex gap-1">
                <p>Already registered?</p>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>

        </div>
    </div>    
@endsection