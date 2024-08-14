@props(['newsItem'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ $newsItem->cover_image ? asset('storage/' . $newsItem->cover_image) : asset('/images/no-image.jpg') }}" alt="News Cover Image"/>
        <div>
            <h3 class="text-2xl">
                <a href="{{ route('news.show', $newsItem->id) }}">{{ $newsItem->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">Published on {{ $newsItem->publish_date->format('M d, Y') }}</div>
            <div class="text-lg mt-4">
                <p>{{ Str::limit($newsItem->content, 100) }}</p>
            </div>
        </div>
    </div>
</x-card>