<x-layout>
    <div class="flex justify-center mb-4">
        <h1 class="text-2xl font-bold text-center">Beheer FAQ Categorieën</h1>
    </div>

    <div class="mx-4">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('categories.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300">
                <i class="fa-solid fa-plus mr-2"></i> Maak een nieuwe categorie
            </a>
        </div>

        @if (session('success'))
            <div class="text-green-500 mb-4">{{ session('success') }}</div>
        @endif

        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0">
            @foreach ($categories as $category)
                <x-category-card :category="$category"/>
            @endforeach
        </div>
    </div>
</x-layout>