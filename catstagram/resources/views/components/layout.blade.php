
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" href="images/favicon.ico" />
            <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
                integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"/>
            <script src="//unpkg.com/alpinejs" defer></script>
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            colors: {
                                laravel: "#2dcbef",
                            },
                        },
                    },
                };
            </script>
            <title>Catstagram</title>
        </head>
        <body class="mb-48">
            <nav class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-4">
                    <a href="/"
                        ><img class="w-24" src="{{ asset('images/logo.png')}}" alt="" class="logo"
                    /></a>
                    <a href="{{ route('news.index') }}" class="text-lg font-bold hover:text-laravel">
                        <i class="fa-solid fa-newspaper mr-2"></i>
                        Nieuws
                    </a>
                </div>
                <ul class="flex space-x-6 mr-6 text-lg">
                    @auth
                        
                    
                    <li>
                        <span class="font-bold uppercase">
                            <a href="/users/showprofile">Welkom {{auth()->user()->name}}</a>
                        </span>
                    </li>
                    <!-- Conditional display for Admin Panel -->
                    @if(auth()->user()->is_admin)
                    <li>
                        <a href="/dashboard" class="hover:text-laravel">
                            <i class="fa-solid fa-gear"></i> Admin Panel
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="/posts/manage" class="hover:text-laravel">
                            <i class="fa-solid fa-gear"></i> Beheer Posts
                        </a>
                    </li>
                    @endif

                    <li>
                        <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>Logout
                        </button>
                        </form>
                    </li>
                    @else
                    <li>
                        <a href="/register" class="hover:text-laravel"
                            ><i class="fa-solid fa-user-plus"></i> Registreer</a
                        >
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel"
                            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a
                        >
                    </li>
                    @endauth
                </ul>
            </nav>
            <main>
    {{$slot}}
            </main>
            <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <a href="/about" class="ml-2 hover:underline">About</a>
            <a href="{{ route('faqs.index') }}" class="ml-2 hover:underline">FAQ</a>
            <a href="/contactpage" class="ml-2 hover:underline">Contact</a>

            <a
                href="/posts/create"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Maak Post</a
            >
        </footer>

        <x-flash-message/>
    </body>
</html>