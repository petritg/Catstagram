@props(['category'])

<x-card>
    <div>
        <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
                <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>

    </div>

</x-card>
