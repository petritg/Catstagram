<x-layout>
    <h1 class="text-2xl font-bold mb-4">FAQs</h1>

    <a href="{{ route('faqs.create') }}" class="text-blue-500 hover:underline">Create New FAQ</a>

    @if (session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif

    <ul class="mt-6">
        @foreach ($faqs as $faq)
            <li class="mb-4">
                <h2 class="text-xl font-semibold">{{ $faq->question }}</h2>
                <p>{{ $faq->answer }}</p>
                <p><strong>Category:</strong> {{ $faq->category->name }}</p>
                <a href="{{ route('faqs.edit', $faq->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>