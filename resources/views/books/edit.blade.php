@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Book</h1>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title" 
                        name="title"
                        type="string" 
                        class="form-control @error('title') is-invalid @enderror" 
                        value="{{ $book->title }}" 
                        autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="author" class="col-md-4 col-form-label">Author</label>

                    <input id="author" 
                        name="author"
                        type="string" 
                        class="form-control @error('author') is-invalid @enderror" 
                        value="{{ $book->author }}" 
                        autocomplete="author" autofocus>

                    @error('author')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="publisher" class="col-md-4 col-form-label">Publisher</label>

                    <input id="publisher" 
                        name="publisher"
                        type="string" 
                        class="form-control @error('publisher') is-invalid @enderror" 
                        value="{{ $book->publisher }}" 
                        autocomplete="publisher" autofocus>

                    @error('publisher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="publication_date" class="col-md-4 col-form-label">Publication Date</label>

                    <input id="publication_date" 
                        name="publication_date"
                        type="date" 
                        class="form-control @error('publication_date') is-invalid @enderror" 
                        value="{{ $book->date_published }}" 
                        autocomplete="publication_date" autofocus>

                    @error('publication_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <input id="description" 
                        name="description"
                        type="string" 
                        class="form-control @error('description') is-invalid @enderror" 
                        value="{{ $book->description }}" 
                        autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label">Price</label>

                    <input id="price" 
                        name="price"
                        type="integer" 
                        class="form-control @error('price') is-invalid @enderror" 
                        value="{{ $book->price }}" 
                        autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="total_page" class="col-md-4 col-form-label">Total Page</label>

                    <input id="total_page" 
                        name="total_page"
                        type="integer" 
                        class="form-control @error('total_page') is-invalid @enderror" 
                        value="{{ $book->page_count }}" 
                        autocomplete="total_page" autofocus>

                    @error('total_page')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label">Book's Cover</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        {{-- <span class="invalid-feedback" role="alert"> --}}
                            <strong>{{ $message }}</strong>
                        {{-- </span> --}}
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary">Update Book</button>
                    </div>
                    <div class="col-6">
                        <a href="/book" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

