<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $books = Book::paginate(12);
            return view('books') -> with('books', $books);
    }

    public function search(Request $request){
        // Get Search value from request
        $search = $request->input('search');
        // Search in title and author columns for request
        $books = Book::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('author', 'LIKE', "%{$search}%")
                    ->get();
        // return the search view with the results
        return view('search', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the request
        $this->validate($request,[
            'title' => 'required',
            'author' => 'required'
        ]);

        //Create new book
        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        
        // Save book to DB
        $book->save();

        return redirect('books')->with('success','Added Successfully');
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $book = Book::find($id);

        //Update book info
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        
        // Save new info to DB
        $book->save();

        return redirect('books')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if(Book::find($book)) {
            $book->delete();
            return redirect('books')->with('succcess','Book Deleted Successfully');
        } else {
            return redirect()->back();
        }
    }

    
}
