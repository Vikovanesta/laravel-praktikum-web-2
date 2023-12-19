<x-app-layout>
<div class="flex justify-center">
    <div class="container flex flex-col items-center">

        <h1 class="text-center m-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Edit Category</h1>

        <form action="{{ route('book-categories.update', $bookCategory->id) }}" enctype="multipart/form-data" method="POST" class="flex flex-col justify-center items-center w-1/3 p-4 m-4 rounded-lg bg-gray-700">
            @csrf    
            @method('patch')

            <div class="m-2 w-full">
                <label for="name" class="col-md-4 col-form-label">Name</label>

                <input id="name" name="name" type="text" 
                    class="input input-bordered input-primary w-full @error('name') is-invalid @enderror" 
                    value="{{ $bookCategory->name }}"
                    autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex justify-between m-2 w-full max-w-xs">
                <button class="btn btn-success">Save</button>
                <a href={{ route('book-categories.index') }} class="btn btn-error">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

</x-app-layout>