<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Modifier un étudiant</h2>
    </x-slot>

    <div class="p-6 max-w-xl">
        <form action="{{ route('students.update', $student->id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Nom :</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Email :</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Téléphone :</label>
            <input type="number" name="phone" value="{{ old('phone', $student->phone) }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Section :</label>
            <input type="text" name="section" value="{{ old('section', $student->section) }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Nouvelle image (facultatif) :</label>
            <input type="file" name="image" accept="image/*"
                   class="block mb-4">

            @if($errors->any())
                <div class="text-red-600 mb-3">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Modifier
            </button>

            <a href="{{ route('students.index') }}" class="ml-3">Annuler</a>
        </form>
    </div>
</x-app-layout>
