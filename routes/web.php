<?php
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', ['title' => 'Yomitai']);
});

Route::get('/books', [BookController::class,'index'])->name('index');
Route::get('/search',[BookController::class,'search'])->name('search');
Route::get('/exportCsv', [BookController::class,'exportCSV'])->name('exportAll');
Route::get('/exportAuthorCsv', [BookController::class,'exportAuthorCSV'])->name('exportAuthors');
Route::get('/exportTitleCsv', [BookController::class,'exportTitleCSV'])->name('exportTitles');

Route::resource('books', BookController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
