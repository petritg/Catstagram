<x-layout>
@include('partials._hero')
@include('partials._search')   

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless (count($posts) == 0)
    

@foreach($posts as $post)
    <x-post-card :post="$post"/>
@endforeach

@else 
<p>No posts found</p>
@endunless

</div>
</x-layout>
