@props(['faq'])

<x-card>
    <x-card>
        <div>
            <h3 class="text-xl font-bold mb-2">{{ $faq->question }}</h3>
            <p class="text-lg">{{ $faq->answer }}</p>
        </div>
    </x-card>
</x-card>