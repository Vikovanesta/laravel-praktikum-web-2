@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Book Collection</h1>
    
    <h3 class="text-center">total: {{ $bookCount }}</h3>
    <h3 class="text-center">price total: {{ "Rp ".number_format($priceSum, 2, ',', '.') }}</h3>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a href="/book/create" class="btn btn-primary">Add New Book</a>
        </div>
    </div>

    <table class="table table-striped table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Date Published</th>
                <th scope="col">Publisher</th>
                <th scope="col">Page Count</th>
                <th scope="col">Action</th>
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
                    <td>{{ $book->page_count }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

