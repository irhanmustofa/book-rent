<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '2')->where('status','active')->get();
        $books = Book::all();
        return view('book-rent', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(3)->toDateString();

        $book = Book::findOrfail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            session()->flash('message', 'Cannot rent, the book is not available');
            session()->flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date',null)->count();
            if ($count >= 3){
                session()->flash('message', 'Cannot rent, the user has reached the maximum limit');
                session()->flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    // process insert to rentlog table
                    RentLogs::create($request->all());
                    // process update book status
                    $book = Book::findOrfail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();

                    session()->flash('message', 'Rent the book successfully');
                    session()->flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollback();
                    session()->flash('message', 'Failed to rent the book');
                    session()->flash('alert-class', 'alert-danger');
                    return redirect('book-rent');
                }
            }
        }
    }

    public function returnBook(){

        $users = User::where('role_id', '2')->where('status','active')->get();
        $books = Book::all();
        return view('return-book', compact('users', 'books'));
    }

    public function saveReturnBook(Request $request)
    {
        // user & buku yang dipilih untuk di return benar, maka berhasil return book
        // jika salah, maka gagal return book dan muncul notifikasi
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date',null);
        $rentData = $rent->first();
        $countData = $rent->count();
        
        if($countData == 1){
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            session()->flash('message', 'Return the book successfully');
            session()->flash('alert-class', 'alert-primary');
            return redirect('book-return');
        }else{
            session()->flash('message', 'Failed to return the book');
            session()->flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
