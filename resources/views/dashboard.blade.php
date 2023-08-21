@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

    <h1>Wellcome, {{ Auth::user()->username }}</h1>

    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journals"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center text-center">
                        <div class="card-desc">Books</div>
                        <div class="card-count">{{ $bookCount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data cat">
                <div class="row">
                    <div class="col-6"><i class="bi bi-bookmarks"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center text-center">
                        <div class="card-desc">Categories</div>
                        <div class="card-count">{{ $categoryCount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center text-center">
                        <div class="card-desc">User</div>
                        <div class="card-count">{{ $userCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>#Rent Log</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User</th>
                    <th>Book Title</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" class="text-center">NO DATA</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
