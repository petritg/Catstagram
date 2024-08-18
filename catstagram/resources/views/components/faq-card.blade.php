@props(['faq'])


<x-card>
    <div>
        <h3 class="text-xl font-bold mb-2">{{ $faq->question }}</h3>
        <p class="text-lg">{{ $faq->answer }}</p>
        <p class="text-sm text-gray-500 mb-2">Categorie: {{ $faq->category->name }}</p>
        <a href="{{ route('faqs.edit', $faq->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
    </div>
</x-card>
