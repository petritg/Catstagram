<x-layout>
    @include('partials._hero')
     
    @auth
    @if(auth()->user()->is_admin)
    <div class = "flex justify-between items-center mb-4 mx-4">
    <a href="{{ route('news.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300">
        <i class="fa-solid fa-plus mr-2"></i> Maak een nieuwsbericht
    </a>
    </div>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @endif
    @endauth
    
    @unless (count($news) == 0)
        
    
    @foreach($news as $newsItem)
        <x-news-card :newsItem="$newsItem"/>
    @endforeach
    
    @else 
    <p>No news articles found</p>
    @endunless
    
    </div>
    
    
</x-layout>