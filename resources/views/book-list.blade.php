@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<div class="my-5">
    <form action="" method="get">
        <div class="row mb-3">
            <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category) 
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Books Title" aria-label="Recipient's username" >
                    <button type="submit" class="btn btn-primary" id="basic-addon2"><i class="bi bi-search"></i></button>
                  </div>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach ($books as $item)
            
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card h-100">
                <img src="{{ $item->cover !=NULL ? asset('storage/cover/'.$item->cover) : asset('image/default_image.jpg') }}" class="card-img-top" draggable="false">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->book_code }}</h5>
                    <p class="card-text">{{ $item->title }}</p>
                    <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                        {{ $item->status }}
                    </p>
                </div>
            </div>
        </div>
        
        @endforeach
        
    </div>
</div>

@endsection