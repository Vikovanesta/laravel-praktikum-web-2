<x-app-layout>

<div class="flex justify-center">
    <div class="container">
        <h1 class="text-center mt-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Book Collection</h1>
        
        <h3 class="text-center text-3xl dark:text-white">total: {{ $bookCount }}</h3>
        <h3 class="text-center text-3xl dark:text-white">price total: {{ "Rp ".number_format($priceSum, 2, ',', '.') }}</h3>
        <div class="flex flex-col justify-center items-center">
            <div class="my-4 self-center">
                @if (Auth::user()->role ?? 'guest' == 'admin')
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
                @endif
            </div>

            <a href="{{ route('books.indexPopular') }}" class="btn bg-green-500 hover:bg-green-600 text-white mb-4">Most Popular Book</a>
            <a href="{{ route('books.indexFavourites') }}" class="btn bg-red-500 hover:bg-red-600 text-white">My Favorite Books</a>
            
            @if (Session::has('success_message'))
                <div class="alert alert-success text-center mt-3 w-fit">{{ Session::get('success_message') }}</div>
            @elseif (Session::has('delete_message'))
                <div class="alert alert-error text-center mt-3 w-fit">{{ Session::get('delete_message') }}</div>
            @elseif (Session::has('error'))
                <div class="alert alert-error text-center mt-3 w-fit">{{ Session::get('error') }}</div>
            @endif
        </div>
    
        <form action="{{ route('books.search') }}" method="get" class="flex-row my-4"> 
            @csrf
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" 
                       name="search"
                       id="search"
                       class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                       placeholder="Search ..." 
                       style="width: 30%;">
            </div>
        </form>

        <div class="relative inline-flex mb-4">
            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" 
                 xmlns="http://www.w3.org/2000/svg" 
                 viewBox="0 0 412 232">
                <path 
                    d="M412 0L206 232 0 0h137l69 104 69-104h137z" 
                    fill="#374151"/>
            </svg>
            <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    name="category" 
                    id="category"
                    onchange="location = this.value;">
                <option value="{{ route('books.index') }}">All</option>
                @foreach ($bookCategories as $category)
                    <option value="{{ route('books.index', ['category' => $category->id]) }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-center">No</th>
                        <th scope="col" class="px-5 py-3 text-center">Title</th>
                        <th scope="col" class="px-5 py-3 text-center">Author</th>
                        <th scope="col" class="px-5 py-3 text-center">Price</th>
                        <th scope="col" class="px-5 py-3 text-center">Date Published</th>
                        <th scope="col" class="px-5 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td scope="row" class="px-6 py-4">{{ ++$no }}</td>
                            <td class="px-5 py-4 flex flex-col items-center">
                                <span class="font-medium text-xl text-gray-900 whitespace-nowrap dark:text-white py-2">
                                    {{ $book->title }}
                                </span>
                                <img src="{{ $book->cover_url }}" alt="book cover">
                            </td>
                            <td class="px-5 py-4">{{ $book->author }}</td>
                            <td class="px-5 py-4">{{ "Rp ".number_format($book->price, 2, ',', '.') }}</td>
                            <td class="px-5 py-4">{{ $book->date_published->format('d F Y') }}</td>
                            <td class="px-5 py-4">
                                @if (Auth::user()->role ?? 'guest' == 'admin')
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex gap-1 justify-center">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('books.show', $book->book_seo) }}" class="btn btn-primary">Detail</a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">Edit</a>
                                        <button type="submit" class="btn bg-red-500 hover:bg-red-600 text-white" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                 @else
                                    <a href="{{ route('books.show', $book->book_seo) }}" class="btn btn-primary">Detail</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-center">
                <div>{{ $books->links() }}</div>
            </div>
        </div>
    </div>


</div>

</x-app-layout>

