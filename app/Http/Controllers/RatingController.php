<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class RatingController extends Controller
{
    
    public function index()
    {
        
        $books = Book::orderBy('average_rating', 'desc')->take(50)->get();
        $authors = Author::all(); 
        return view('rating.index', ['books' => $books, 'authors' => $authors]);
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'author_id' => 'required',
            'book_id' => 'required',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        
        $book = Book::find($request->book_id);

        
        if (!$book) {
            return redirect()->back()->with('error', 'Book not found');
        }

       
        $totalRatings = $book->average_rating * $book->voter; 
        $book->voter += 1; 
        $book->average_rating = ($totalRatings + $request->rating) / $book->voter; 
        $book->save();

        
        return redirect()->route('books.index')->with('success', 'Rating submitted successfully');
    }
}