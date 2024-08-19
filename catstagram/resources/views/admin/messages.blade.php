<x-layout>
    <x-card>
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Berichten
            </h1>
            <h2 class="text-center">Deze berichten komen van gebruikers die het contactformulier hebben ingevuld</h2>
            <br>
        </header>  
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($messages->isEmpty())
                @foreach ($messages as $message)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <div class="flex flex-col space-y-2 max-w-lg">
                            <div class="font-bold">Onderwerp:</div>
                            <div class="text-gray-800">{{ $message->subject }}</div>
                            
                            <div class="font-bold">Bericht:</div>
                            <div class="text-gray-800 break-words">{{ $message->message }}</div>
                            
                            <div class="font-bold">Email:</div>
                            <div class="text-gray-800">{{ $message->email }}</div>
                        </div>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">
                                <i class="fa-solid fa-trash"></i> Verwijder
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">Geen berichten gevonden</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>