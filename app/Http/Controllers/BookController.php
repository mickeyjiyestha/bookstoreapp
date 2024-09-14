<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\author;

class BookController extends Controller
{
    
    public function index(Request $request)
{
    
    $listShow = $request->input('list', 10);
    $search = $request->input('search', '');

    
    $books = Book::with('author', 'category')
                 ->when($search, function ($query, $search) {
                     return $query->where('name', 'like', "%{$search}%")
                                  ->orWhereHas('author', function ($q) use ($search) {
                                      $q->where('author', 'like', "%{$search}%");
                                  });
                 })
                 ->take($listShow)
                 ->get();

    
    return view('books.index', [
        'books' => $books, 
        'listShow' => $listShow, 
        'search' => $search, 
    ]);
}




   
    public function createRating()
    {
        $authors = Author::all();
        return view('books.insert_rating', ['authors' => $authors]);
    }

    public function getBooksByAuthor(Request $request)
    {
        $books = Book::where('author_id', $request->author_id)->get();
        return response()->json($books);
    }
}