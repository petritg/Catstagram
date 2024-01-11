<x-layout>
<x-card class="p-10 max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Maak een post
                        </h2>
                        <p class="mb-4">Post een kattenfoto en geef de mensen meer kleur in hun leven!</p>
                    </header>

                    <form method="POST" action="/posts">
                        @csrf
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Titel</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Geen te lange titel aub..."
                            />
                            @error('title')
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
                            />
                            @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />
                        </div> --}}

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
                            ></textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Maak Post
                            </button>

                            <a href="/" class="text-black ml-4"> Terug </a>
                        </div>
                    </form>
                </x-card>
            </x-layout>