<x-layout>
    @include('partials._hero')

    <div class="flex justify-center mb-4">
        <h1 class="text-2xl font-bold text-center">FAQs</h1>
    </div>

    <a href="{{ route('faqs.create') }}" class="text-blue-500 hover:underline">Maak een nieuwe FAQ</a>

    @if (session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($faqs as $faq)
                <x-faq-card :faq="$faq"/>
            @endforeach

            <div class="border-b border-gray-200 my-4"></div>
    </div>
</x-layout>