<x-layout>
    <a href="{{ route('news.index') }}" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Ga Terug
    </a>
    <div class="mx-4">
        <x-card>
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-full md:w-3/4 lg:w-2/3 mr-6 mb-6"
                    src="{{$news->cover_image ? asset('storage/' . $news->cover_image)
                    : asset('/images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$news->title}}</h3>
                <div class="text-xl font-bold mb-4">Published on {{ $news->publish_date->format('M d, Y') }}</div>
                
                
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    {{-- <h3 class="text-3xl font-bold mb-4">
                        Content
                    </h3> --}}
                    <div class="text-lg space-y-6">
                        {{$news->content}}
                    </div>
                </div>
            </div>
        </x-card>
        @auth
        @if(auth()->user()->is_admin)
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="{{ route('news.edit', $news->id) }}">
            <i class="fa-solid fa-pencil"></i>
            Bewerk
            </a>

           <form method="POST" action="{{ route('news.destroy', $news->id) }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-solid fa-trash"></i>Verwijder
                </button>
            </form>
        </x-card> 
        @endif
        @endauth
    </div>
</x-layout>