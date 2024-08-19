<x-layout>
    <h1 class="text-2xl font-bold mb-4">Maak een nieuwe FAQ</h1>

    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="question" class="block text-lg mb-2">Vraag</label>
            <input type="text" name="question" id="question" class="border border-gray-300 p-2 w-full" required>
            @error('question')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="answer" class="block text-lg mb-2">Antwoord</label>
            <textarea name="answer" id="answer" class="border border-gray-300 p-2 w-full" required></textarea>
            @error('answer')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-lg mb-2">Categorie</label>
            <select name="category_id" id="category_id" class="border border-gray-300 p-2 w-full" required>
                <option value="" disabled selected>Selecteer een Categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="new_category" class="block text-lg mb-2">Of maak een nieuwe Categorie</label>
            <input type="text" name="new_category" id="new_category" class="border border-gray-300 p-2 w-full">
            @error('new_category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Maak FAQ aan</button>
    </form>

    <script>
        const categoryDropdown = document.getElementById('category_id');
        const newCategoryInput = document.getElementById('new_category');

        categoryDropdown.addEventListener('change', function() {
            if (categoryDropdown.value) {
                newCategoryInput.disabled = true;
            } else {
                newCategoryInput.disabled = false;
            }
        });

        newCategoryInput.addEventListener('input', function() {
            if (newCategoryInput.value.trim() !== '') {
                categoryDropdown.disabled = true;
            } else {
                categoryDropdown.disabled = false;
            }
        });
    </script>
</x-layout>