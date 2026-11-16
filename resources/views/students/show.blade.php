<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Détails de l'étudiant</h2>
    </x-slot>

    <div class="p-6">
        <p><strong>Nom :</strong> {{ $student->name }}</p>
        <p><strong>Email :</strong> {{ $student->email }}</p>
        <p><strong>Téléphone :</strong> {{ $student->phone }}</p>
        <p><strong>Section :</strong> {{ $student->section }}</p>

        <a href="{{ route('students.edit', $student->id) }}"
           class="text-green-600">Modifier</a>

        <a href="{{ route('students.index') }}"
           class="text-blue-600 ml-4">Retour à la liste</a>
    </div>
</x-app-layout>
