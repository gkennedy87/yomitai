@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron px-5">
            <div class="container">
                <h2>Welcome to the LMS</h2>
                <p class="lead">
                To add a book to the library, please enter the title and author below.
                </p>
                @include('inc.booksForm')
            </div>
            
        </div>
        @include('inc.booksTable')
    </div>
@endsection