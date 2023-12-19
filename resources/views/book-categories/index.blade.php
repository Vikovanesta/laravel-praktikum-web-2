<x-app-layout>

    <div class="flex justify-center">
        <div class="container flex flex-col justify-center items-center">
            <h1 class="text-center mt-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Book Categories</h1>
            
            <div class="flex flex-col justify-center items-center">
                <div class="my-4 self-center">
                    @if (Auth::user()->role ?? 'guest' == 'admin')
                        <a href="{{ route('book-categories.create') }}" class="btn btn-primary">Add New Category</a>
                    @endif
                </div>
    
                @if (Session::has('success_message'))
                    <div class="alert alert-success text-center mt-3 w-fit">{{ Session::get('success_message') }}</div>
                @elseif (Session::has('delete_message'))
                    <div class="alert alert-error text-center mt-3 w-fit">{{ Session::get('delete_message') }}</div>
                @elseif (Session::has('error'))
                    <div class="alert alert-error text-center mt-3 w-fit">{{ Session::get('error') }}</div>
                @endif
            </div>
        
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-5 py-3 text-center">No</th>
                            <th scope="col" class="px-5 py-3 text-center">Category</th>
                            <th scope="col" class="px-5 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookCategories as $category)
                            <tr>
                                <td scope="row" class="px-6 py-4">{{ $no++ }}</td>
                                <td class="px-5 py-4 flex flex-col items-center">
                                    <span class="font-medium text-xl text-gray-900 whitespace-nowrap dark:text-white py-2">
                                        {{ $category->name }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <form action="{{ route('book-categories.destroy', $category->id) }}" method="POST" class="flex gap-1 justify-center">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('book-categories.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                        <button type="submit" class="btn bg-red-500 hover:bg-red-600 text-white" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    
    </div>
    
    </x-app-layout>
    
    