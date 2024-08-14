<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24"
                    >
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Maak een nieuwsbericht
                            </h2>
                        </header>
    
                        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                                <label for="title" class="inline-block text-lg mb-2"
                                    >Titel</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="title"
                                    value="{{old('title')}}"
                                />
                                @error('title')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="publish_date" class="inline-block text-lg mb-2">Publicatiedatum</label>
                                <input
                                    type="date"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="publish_date"
                                    value="{{ old('publish_date') }}"
                                />
                                @error('publish_date')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
    
                            <div class="mb-6">
                                <label for="cover_image" class="inline-block text-lg mb-2">
                                    Foto
                                </label>
                                <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="cover_image"
                                />
                                @error('cover_image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="content" class="inline-block text-lg mb-2">Inhoud</label>
                                <textarea
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="content"
                                    rows="10"
                                    placeholder="Inhoud van het nieuwsbericht..."
                                >{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                    Maak Nieuwsbericht
                                </button>
    
                                <a href="{{ route('news.index') }}" class="text-black ml-4"> Terug </a>
                            </div>
                        </form>
                    </x-card>
                </x-layout>