@extends('layouts.app')

@section('content')
    <div class="container w-75">
        <div class="row d-flex justify-content-center">
            <div class="jumbotron">
                <div class="container">
                    <h2>Welcome to the LMS</h2>
                        <p class="lead">
                            To add a book to the library, please enter the title and author below.
                        </p>
                        @include('inc.booksForm')
                </div>
            </div>
        </div>
        <div class="row">
            @include('inc.booksTable') 
        </div>
    </div>
@endsection