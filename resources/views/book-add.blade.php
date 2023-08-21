@extends('layouts.mainlayout')

@section('title', 'Add-Book')

@section('content')
<h1>Input Book</h1>
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
    <form action="book-add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Code Book</label>
            <input type="text" name="book_code" id="code" class="form-control" value="{{ old('book_code') }}">
        </div>
        <div class="form-group mb-3">
            <label for="name">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group mb-3">
            <label for="name">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="name">Category</label>
            @foreach ($categories as $item)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault" name="categories[]">
                <label class="form-check-label" for="flexCheckDefault">
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