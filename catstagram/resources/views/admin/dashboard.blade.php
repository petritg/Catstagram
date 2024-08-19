<x-layout>
    <x-card>
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Admin Panel
            </h1>
        </header>  
        <div class="flex justify-center space-x-4 mt-6">
            <a href="/dashboard/manage" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300">
                Beheer posts
            </a>
            <a href="/dashboard/messages" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-green-600 transition-colors duration-300">
                Bekijk berichten
            </a>
        </div>
    </x-card>
</x-layout>