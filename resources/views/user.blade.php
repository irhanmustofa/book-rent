@extends('layouts.mainlayout')

@section('title', 'Users')

    
@section('content')
    <h1>User List</h1>

    <div class="my-3 d-flex justify-content-end">
        <a href="/user-banned" class="btn btn-secondary m-2">VIew baned user</a>
        <a href="/registed-users" class="btn btn-success m-2">New Registered user</a>
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
                <th>Username</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->status }}</td>
                <td>
                        <a href="/user-detail/{{ $item->slug }}" class="btn btn-primary">detail</a>
                        <form action="/user-delete/{{ $item->slug }}" method="POST">
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