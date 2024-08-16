<x-layout>
    @include('partials._hero')
     
    <h1 class="text-2xl font-bold mb-4">Nieuws</h1>
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
    @unless (count($news) == 0)
        
    
    @foreach($news as $newsItem)
        <x-news-card :newsItem="$newsItem"/>
    @endforeach
    
    @else 
    <p>No news articles found</p>
    @endunless
    
    </div>
    
    
</x-layout>