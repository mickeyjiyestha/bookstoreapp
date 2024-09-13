<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')
            ->withSum('books', 'voter')
            ->orderBy('books_sum_voter', 'desc') 
            ->limit(10)
            ->get();

        return view('author.index', compact('authors'));
    }
}