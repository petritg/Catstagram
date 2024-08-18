@props(['faq'])


<x-card>
    <div>
        <h3 class="text-xl font-bold mb-2 break-words">{{ $faq->question }}</h3>
        <p class="text-lg whitespace-normal break-words">{{ $faq->answer }}</p>
        <p class="text-sm text-gray-500 mb-2">Categorie: {{ $faq->category->name }}</p>
        @auth
        @if(auth()->user()->is_admin)
        <a href="{{ route('faqs.edit', $faq->id) }}" class="text-blue-500 hover:underline">
            <i class="fa-solid fa-pencil"></i>Edit</a>
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">
                        <i class="fa-solid fa-trash"></i>Delete</button>
                </form>
        @endauth
        @endif
    </div>
</x-card>
