@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron px-5">
            <p class="lead">
                To add a book to the library, please enter the title and author below.
            </p>
            @include('inc.booksForm')
        </div>
        @include('inc.booksTable')
    </div>
@endsection