<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->title) {
            if ($request->title == null && $request->category) {
                $books = Book::whereHas('categories', function ($query) use ($request) {
                    $query->where('categories.id', $request->category);
                })->get();
            } elseif ($request->category == null && $request->title) {
                $books = Book::where('title', 'like', '%' . $request->title . '%')->get();
            } else {
                $books = Book::where('title', 'like', '%' . $request->title . '%')
                    ->whereHas('categories', function ($query) use ($request) {
                        $query->where('categories.id', $request->category);
                    })->get();
            }
        } else {
            $books = Book::all();
        }
        return view('book-list', compact('books', 'categories'));
    }
}
