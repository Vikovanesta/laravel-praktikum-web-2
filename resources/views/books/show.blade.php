@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Book Detail</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5 d-flex flex-row">
                <div class="card-header d-flex col-4">
                    <img src="{{ $book->cover_url }}" alt="Book Cover" class="img-fluid">
                </div>
                <div class="card-body col-8">
                    <h2 class="text-center fw-bold">{{ $book->title }}</h2>
                    <p class="card-text text-center">{{ $book->description }}</p>
                    <p class="card-text">Author: {{ $book->author }}</p>
                    <p class="card-text">Date Published: {{ $book->date_published }}</p>
                    <p class="card-text">Publisher: {{ $book->publisher }}</p>
                    <p class="card-text">Page Count: {{ $book->page_count }}</p>
                    <p class="card-text">Price: {{ "Rp ".number_format($book->price, 2, ',', '.') }}</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    

    

</div>

@endsection

