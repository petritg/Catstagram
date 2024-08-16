<x-layout>
    <h1 class="text-2xl font-bold mb-4">Manage FAQ Categories</h1>

    <a href="{{ route('categories.create') }}" class="text-blue-500 hover:underline">Create New Category</a>

    @if (session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif

    <ul class="mt-6">
        @foreach ($categories as $category)
            <li class="mb-4">
                <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
                <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>