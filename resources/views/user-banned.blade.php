@extends('layouts.mainlayout')

@section('title', 'Users Banned')

    
@section('content')
    <h1>Banned User List</h1>

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
            @foreach ($bannedUsers as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->status }}</td>
                <td>
                        <a href="/user-restore/{{ $item->slug }}" class="btn btn-primary">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection