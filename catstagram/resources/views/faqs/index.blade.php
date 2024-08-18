<x-layout>
    @include('partials._hero')

    <div class="flex justify-center mb-4">
        <h1 class="text-2xl font-bold text-center">FAQs</h1>
    </div>

    <div class="flex justify-between items-center mb-4 mx-4">
        <a href="{{ route('faqs.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300">
            <i class="fa-solid fa-plus mr-2"></i> Maak een nieuwe FAQ
        </a>
        

        <!-- Dropdown for Category Selection -->
        <form action="{{ route('faqs.index') }}" method="GET">
            <select name="category" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                <option value="">Alle Categorieën</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="flex justify-between items-center mb-4 mx-4">
    <a href="{{ route('categories.create') }}" class= "inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300">
        <i class="fa-solid fa-plus mr-2"></i> Maak een nieuwe categorie
    </a>
    </div>
    @if (session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($faqs as $faq)
                <x-faq-card :faq="$faq"/>
            @endforeach

            <div class="border-b border-gray-200 my-4"></div>
    </div>
</x-layout>