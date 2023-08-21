@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('page-name', 'Dashboard')

@section('content')
<h1>Book List</h1>

<div class="my-3 d-flex justify-content-end">
    <a href="book-add" class="btn btn-success">Add New</a>
</div>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Code Book</th>
            <th>Title</th>
            <th>Categories</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->book_code }}</td>
            <td>{{ $item->title }}</td>
            <td>
                @foreach ($item->categories as $category)
                    <ul>
                        <li>{{ $category->name }}</li>
                    </ul>
                @endforeach
            </td>
            <td>{{ $item->status }}</td>
            <td>
                <form method="POST" action="book-delete/{{ $item->slug }}">
                    <a href="/book-edit/{{ $item->slug }}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                        title='Delete'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection