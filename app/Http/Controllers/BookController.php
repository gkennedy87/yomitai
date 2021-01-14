<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


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
        // Exports Titles and Authors as CSV
    public function exportCSV() {
    
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/csv'
        ,   'Content-Disposition' => 'attachment; filename=yomitaiData.csv'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
    ];
        //Add Headers to each column in the CSV
        $list = Book::all()->toArray();
        array_unshift($list,array_keys($list[0]));
        
        $callback = function() use ($list) {
            $FH = fopen('php://output','w');
            foreach($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
        
    }
        // Export Authors as CSV

    public function exportAuthorCSV() {

        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/csv'
        ,   'Content-Disposition' => 'attachment; filename=AuthorData.csv'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
    ];
        //Add Headers to each column in the CSV
        $query = Book::query()
                    ->select('author')
                    ->get();
        $list = $query->toArray(); 
        array_unshift($list,array_keys($list[0]));
        
        $callback = function() use ($list) {
            $FH = fopen('php://output','w');
            foreach($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
        
    }
    // Export titles as CSV
    public function exportTitleCSV() {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/csv'
        ,   'Content-Disposition' => 'attachment; filename=TitlesData.csv'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
    ];
        //Add Headers to each column in the CSV
        $query = Book::query()
                    ->select('title')
                    ->get();
        $list = $query->toArray(); 
        array_unshift($list,array_keys($list[0]));
        
        $callback = function() use ($list) {
            $FH = fopen('php://output','w');
            foreach($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
        
    }

    // XML Controller Actions 
    public function saveXML() {
       $books = Book::all();

       return response()->xml(['books' => $books->toArray()]);

    }
    public function saveAuthorXML() {
        $books = Book::query()->select('author')->get();
 
        return response()->xml(['books' => $books->toArray()]);
 
     }
     public function saveTitleXML() {
        $books = Book::query()->select('title')->get();
 
        return response()->xml(['books' => $books->toArray()]);
 
     }

    
}
