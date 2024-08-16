<x-layout>
    <h1 class="text-2xl font-bold mb-4">Edit FAQ</h1>

    <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="question" class="block text-lg mb-2">Question</label>
            <input type="text" name="question" id="question" class="border border-gray-300 p-2 w-full" value="{{ $faq->question }}" required>
            @error('question')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="answer" class="block text-lg mb-2">Answer</label>
            <textarea name="answer" id="answer" class="border border-gray-300 p-2 w-full" required>{{ $faq->answer }}</textarea>
            @error('answer')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-lg mb-2">Category</label>
            <select name="category_id" id="category_id" class="border border-gray-300 p-2 w-full" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update FAQ</button>
    </form>
</x-layout>