<x-app-layout>

<div class="flex justify-center">
    <div class="container">

        <h1 class="text-center m-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Book Detail</h1>
        <div class="flex justify-center">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow max-h-96 md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700" style="min-width: 70%">
                <img src="{{ $book->cover_url }}" alt="Book Cover" class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $book->title }}</h2>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $book->description }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Author: {{ $book->author }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Date Published: {{ $book->date_published->format('d/m/Y') }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Publisher: {{ $book->publisher }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Page Count: {{ $book->page_count }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: {{ "Rp ".number_format($book->price, 2, ',', '.') }}</p>
                    <a href="{{ route('books.index') }}" class="text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-24">Back</a>
                </div>
            </div>
        </div>

        <h1 class="text-center m-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Galleries</h1>
        <div class="flex justify-center">
            @if ($book->galleries->count() > 0)
                <div class="flex flex-wrap justify-center items-center p-4 leading-normal bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700" style="min-width: 70%">
                    @foreach ($book->galleries as $gallery)
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <img src="{{ $gallery->image_url }}" alt="Book Cover" class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex justify-center bg-white border border-gray-200 rounded-lg shadow max-h-96 md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700" style="min-width: 70%">
                    <div class="p-4 leading-normal">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">This book has no gallery</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

</x-app-layout>