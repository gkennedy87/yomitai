@extends('layouts.app')

@section('content')
    <div class="container w-75">
        <div class="row d-flex justify-content-center">
            <div class="jumbotron">
                <div class="container">
                    <h2>Welcome to the {{config('app.name','Yomitai')}}</h2>
                        <p class="lead">
                            To add a book to the library, please enter the title and author below.
                        </p>
                        @include('inc.booksForm')
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-end align-content-center">
            <div class="col-4 align-bottom">
                <div class="d-flex gap-1">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download CSV
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('exportTitles')}}">Titles</a>
                        <a class="dropdown-item" href="{{route('exportAuthors')}}">Authors</a>
                        <a class="dropdown-item" href="{{route('exportAll')}}">Titles & Authors</a>
                        </div>
                  </div>
                  <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download XML
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('saveTitleXml')}}">Titles</a>
                            <a class="dropdown-item" href="{{route('saveAuthorXml')}}">Authors</a>
                            <a class="dropdown-item" href="{{route('saveXml')}}">Titles & Authors</a>
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="col-8">
                @include('inc.searchField')
            </div>
        </div>
        <div class="row">
            @include('inc.booksTable') 
        </div>
    </div>
@endsection