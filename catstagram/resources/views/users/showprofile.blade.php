<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Bewerk account
            </h2>
            <p class="mb-4">Pas je account gegevens aan</p>
        </header>

        <form method="POST" action="{{ route('editprofile') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Naam
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{$user->name}}"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Verjaardag
                </label>
                <input
                    type="date"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="birthday"
                    value="{{$user->birthday}}"
                />
                @error('birthday')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="aboutme"
                    class="inline-block text-lg mb-2"
                >
                    Over jou:
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="aboutme"
                    rows="10"
                    
                >{{$user->aboutme}}</textarea>
                @error('aboutme')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="avatar" class="inline-block text-lg mb-2">
                    Je Avatar
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="avatar"
                />
                <img
                            class="w-48 mr-6 mb-6"
                            src="{{$user->avatar ? asset('storage/' . $user->avatar)
                            : asset('/images/no-image.png')}}"
                            alt=""
                        />
                @error('avatar')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{$user->email}}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                    Wachtwoord
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password2"
                    class="inline-block text-lg mb-2"
                >
                    Herhaal Wachtwoord
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation"
                    
                />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Bewerk
                </button> 
            </div>
        </form>
</x-card>
    </x-layout>