<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book', compact('books'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('book-add', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'book_code'=>'required|unique:books|max:255',
            'title'=>'required|max:255',
        ]);

        $newName = '';
        if ($request->hasFile('image')) 
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request->request->add(['cover' => $newName]);
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);

        return redirect('books')->with('status', 'Book has been added');
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();

        return view('book-edit', compact(['book', 'categories']));
    }

    public function update(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request->request->add(['cover' => $newName]);
            $request['cover'] = $newName;
        } 
        
        $book = Book::where('slug', $request->slug)->first();
        $book->update($request->all());
        $book->categories()->sync($request->categories);

        return redirect('books')->with('status', 'Book has been updated');

    }

    public function destroy(Request $request,$slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        $book->categories()->delete();

        return redirect('books')->with('status', 'Book has been deleted');

    }
}
