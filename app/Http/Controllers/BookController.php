<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    public function index()
    {
        $books = book::with(['author', 'category'])
                     ->orderBy('average_rating', 'desc')
                     ->limit(10)
                     ->get();

        return view('books.index', ['book' => $books]);
    }
}