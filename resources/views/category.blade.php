@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('page-name', 'Dashboard')

@section('content')
<h1>Category List</h1>
<div class="my-3 d-flex justify-content-end">
    <a href="category-add" class="btn btn-success">Add New</a>
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
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form method="POST" action="category-delete/{{ $item->slug }}">
                    <a href="category-edit/{{ $item->slug }}" class="btn btn-primary">Edit</a>
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection