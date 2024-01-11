<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24"
                    >
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Bewerk Post
                            </h2>
                            <p class="mb-4">Bewerk je post</p>
                        </header>
    
                        <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label for="title" class="inline-block text-lg mb-2"
                                    >Titel</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="title"
                                    placeholder="Geen te lange titel aub..."
                                    value="{{$post->title}}"
                                />
                                @error('title')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="title" class="inline-block text-lg mb-2"
                                    >Kattenras</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="breed"
                                    value="{{$post->breed}}"
                                />
                                @error('breed')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="location"
                                    class="inline-block text-lg mb-2"
                                    >Locatie</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="location"
                                    placeholder="Voorbeeld: Brussel, België"
                                    value="{{$post->location}}"
                                />
                                @error('location')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="tags" class="inline-block text-lg mb-2">
                                    Tags (Gescheiden door komma's)
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="tags"
                                    placeholder="Voorbeeld: schattig, natuur, zomer"
                                    value="{{$post->tags}}"
                                />
                                @error('tags')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="logo" class="inline-block text-lg mb-2">
                                    Foto
                                </label>
                                <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="photo"
                                />
                                <img
                            class="w-48 mr-6 mb-6"
                            src="{{$post->photo ? asset('storage/' . $post->photo)
                            : asset('/images/no-image.png')}}"
                            alt=""
                        />
                                @error('photo')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="description"
                                    class="inline-block text-lg mb-2"
                                >
                                    Beschrijving
                                </label>
                                <textarea
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="description"
                                    rows="10"
                                    placeholder="Meer details over de foto. Leef je uit!"
                                    
                                >{{$post->description}}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                    Bewerk Post
                                </button>
    
                                <a href="/" class="text-black ml-4"> Terug </a>
                            </div>
                        </form>
                    </x-card>
                </x-layout>