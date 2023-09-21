@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Book Collection</h1>
    
    <h3 class="text-center">total: {{ $bookCount }}</h3>
    <h3 class="text-center">price total: {{ "Rp ".number_format($priceSum, 2, ',', '.') }}</h3>

    <table class="table table-striped table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Date Published</th>
                <th scope="col">Publisher</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td scope="row">{{ ++$no }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ "Rp ".number_format($book->price, 2, ',', '.') }}</td>
                    <td>{{ $book->date_published }}</td>
                    <td>{{ $book->publisher }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

