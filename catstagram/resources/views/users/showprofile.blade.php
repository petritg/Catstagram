<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"
                    ><i class="fa-solid fa-arrow-left"></i> Ga Terug
                </a>
                <div class="mx-4">
                    <x-card>
                        <div
                            class="flex flex-col items-center justify-center text-center"
                        >
                            <img
                                class="w-48 mr-6 mb-6"
                                src="{{$user->avatar ? asset('storage/' . $user->avatar)
                                : asset('/images/no-image.png')}}"
                                alt=""
                            />
    
                            <h3 class="text-2xl mb-2">{{$user->name}}</h3>
                            <div class="text-xl font-bold mb-4">{{$user->birthday}}</div>
                            <div class="text-lg my-4">
                            </div>
                            <div class="border border-gray-200 w-full mb-6"></div>
                            <div>
                                <h3 class="text-3xl font-bold mb-4">
                                    Over Mij:
                                </h3>
                                <div class="text-lg space-y-6">
                                    {{$user->aboutme}}
    
                                </div>
                            </div>
                        </div>
                    </x-card>
                    {{-- <x-card class="mt-4 p-2 flex space-x-6">
                        <a href="/posts/{{$post->id}}/edit">
                        <i class="fa-solid fa-pencil"></i>
                        Bewerk
                        </a>
    
                        <form method="POST" action="/posts/{{$post->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-solid fa-trash"></i>Verwijder
                            </button>
                        </form>
                    </x-card> --}}
                </div>
    </x-layout>