@extends('layouts.mainlayout')

@section('title', 'New Users')


@section('content')
<h1>Detail User</h1>

<div class="my-3 d-flex justify-content-end">
    @if ($user->status == 'inactive')
    <a href="/user-approve/{{ $user->slug }}" class="btn btn-info m-2">Approved User</a>
    @endif
</div>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="my-5 w-25">
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" value="{{ $user->username }}" readonly>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Phone</label>
        <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Address</label>
        <textarea type="text" class="form-control" readonly>{{ $user->address }}</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Status</label>
        <input type="text" class="form-control" value="{{ $user->status }}" readonly>
    </div>
    
</div>

<div class="mt-5">
    <x-rent-log-table :rentlogs='$rentlogs' />
</div>

@endsection