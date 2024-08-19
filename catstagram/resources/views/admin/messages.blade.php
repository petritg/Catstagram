<x-layout>
    <x-card>
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Berichten
            </h1>
            <p>Deze berichten komen van gebruikers die het contactformulier hebben ingevuld</p>
        </header>  
        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2">Onderwerp</th>
                    <th class="px-4 py-2">Bericht</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Actie</th>
                </tr>
            </thead>
            <tbody>
                @unless ($messages->isEmpty())
                    @foreach ($messages as $message)
                        <tr class="border-gray-300">
                            <td class="px-4 py-4 border-t border-b border-gray-300 text-lg">
                                {{$message->subject}}
                            </td>
                            <td class="px-4 py-4 border-t border-b border-gray-300 text-lg">
                                {{$message->message}}
                            </td>
                            <td class="px-4 py-4 border-t border-b border-gray-300 text-lg">
                                {{$message->email}}
                            </td>
                            <td class="px-4 py-4 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700">
                                        <i class="fa-solid fa-trash"></i> Verwijder
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">
                            Geen berichten gevonden.
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>