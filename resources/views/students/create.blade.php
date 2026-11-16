<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Ajouter un étudiant</h2>
    </x-slot>

    <div class="p-6 max-w-xl">
        <form action="{{ route('students.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf

            <label>Nom :</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Email :</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Téléphone :</label>
            <input type="number" name="phone" value="{{ old('phone') }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Section :</label>
            <input type="text" name="section" value="{{ old('section') }}"
                   class="block w-full border p-2 mb-3" required>

            <label>Image :</label>
            <input type="file" name="image" accept="image/*"
                   class="block mb-4" required>

            @if($errors->any())
                <div class="text-red-600 mb-3">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Enregistrer
            </button>

            <a href="{{ route('students.index') }}" class="ml-3">Annuler</a>
        </form>
    </div>
</x-app-layout>
