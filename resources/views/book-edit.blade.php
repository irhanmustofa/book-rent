@extends('layouts.mainlayout')

@section('title', 'Edit-Book')

@section('content')
<h1>Edit Book</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="mt-5">
    <form action="/book-edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="name">Code Book</label>
            <input type="text" name="book_code" id="code" class="form-control" value="{{ $book->book_code }}">
        </div>
        <div class="form-group mb-3">
            <label for="name">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
        </div>
        <div class="form-group mb-3">
            <label for="name">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="name">Image</label>
            <div class="mt-2">
                @if ($book->cover != null)
                <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="100" height="100" class="img-fluid">
            @else
                <img src="{{ asset('image/default_image.jpg') }}" alt="" width="100" height="100" class="img-fluid">
            @endif
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="name">Category</label>
            @foreach ($categories as $item)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault{{ $item->id }}"
                    name="categories[]" @if ($book->categories->contains($item->id)) checked @endif>
                <label class="form-check-label" for="flexCheckDefault{{ $item->id }}">
                    {{ $item->name }}
                </label>
            </div>
            @endforeach
        </div>


        <div class="form-group mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
</div>

@endsection