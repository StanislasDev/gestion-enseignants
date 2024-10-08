<x-default-layout title="editer un enseignant">
    <div class="flex flex-col justify-center py-12 sm:px-6 lg:px-8">
            <h1 class="text-xl flex justify-center text-sky-700">Modifier un Enseignant</h1>
            <form action="{{ route('admin.enseignants.update', $enseignant->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input label="nom" name="nom" id="nom" value="{{ $enseignant->nom }}" required />
                <x-input label="prenom" name="prenom" id="prenom" value="{{ $enseignant->prenom }}" required />
                <x-input label="email" name="email" id="email" value="{{ $enseignant->email }}" required />
                <x-input label="telephone" name="telephone" id="telephone" value="{{ $enseignant->telephone }}"
                    required />
                <button type="submit" class="rounded-md bg-blue-800 px-3 py-2 text-sm
font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-
visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800 m-3">Mettre à jour</button>
            </form>
    </div>
</x-default-layout>
