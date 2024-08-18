@props(['faq'])


<x-card>
    <div>
        <h3 class="text-xl font-bold mb-2">{{ $faq->question }}</h3>
        <p class="text-lg">{{ $faq->answer }}</p>
        <p class="text-sm text-gray-500 mb-2">Categorie: {{ $faq->category->name }}</p>
    </div>
</x-card>
