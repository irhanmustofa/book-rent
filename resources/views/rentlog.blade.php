@extends('layouts.mainlayout')

@section('title', 'Rent-Log')
    
@section('content')
    <h1>Rent Log List</h1>

    <div class="mt-5">
        <x-rent-log-table :rentlogs='$rentlogs' />
    </div>
@endsection