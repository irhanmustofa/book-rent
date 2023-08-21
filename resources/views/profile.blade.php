@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <div class="mt-5">
        <h2>Your Rent Log</h2>
        <x-rent-log-table :rentlogs='$rentlogs' />
    </div>
@endsection