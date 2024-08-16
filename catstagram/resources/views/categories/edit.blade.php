<x-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-lg mb-2">Category Name</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-2 w-full" value="{{ $category->name }}" required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Category</button>
    </form>
</x-layout>