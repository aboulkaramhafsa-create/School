<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Liste des étudiants</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('students.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Ajouter un étudiant
        </a>

        @if(session('success'))
            <p class="text-green-600 mt-4">{{ session('success') }}</p>
        @endif

        <table class="w-full mt-6 border">
            <tr class="bg-gray-200">
                <th class="p-2">Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>

            @forelse($students as $student)
                <tr class="border text-center">
                    <td class="p-2">{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->section }}</td>
                    <td class="p-2">
                        <a href="{{ route('students.show', $student->id) }}"
                           class="text-blue-600">Détails</a>

                        <a href="{{ route('students.edit', $student->id) }}"
                           class="text-green-600 ml-2">Modifier</a>

                        <form action="{{ route('students.destroy', $student->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer cet étudiant ?')"
                                    class="text-red-600 ml-2">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center">
                        Aucun étudiant trouvé.
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</x-app-layout>
