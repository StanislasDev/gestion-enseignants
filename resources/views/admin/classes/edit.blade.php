<x-default-layout title="editer une classe">
    <div class="flex flex-col justify-center py-12 sm:px-6 lg:px-8">
            <h1 class="text-xl flex justify-center text-sky-700">Modifier la Classe</h1>
            <form action="{{ route('admin.classes.update', $class->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input label="nom" name="nom_classe" id="nom" value="{{ $class->nom_classe }}" required />
                <x-input label="niveau" name="niveau" id="niveau" value="{{ $class->niveau }}" required />
                <button type="submit" class="rounded-md bg-blue-800 px-3 py-2 text-sm
font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-
visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800 m-3">Mettre à jour</button>
            </form>
    </div>
</x-default-layout>
