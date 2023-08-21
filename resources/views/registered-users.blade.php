@extends('layouts.mainlayout')

@section('title', 'New Users')


@section('content')
<h1>User List</h1>

<div class="my-3 d-flex justify-content-end">
    <a href="/users" class="btn btn-success m-2">Approved User List</a>
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
        @foreach ($registeredUsers as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="user-detail/{{ $item->slug }}" class="btn btn-primary">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection