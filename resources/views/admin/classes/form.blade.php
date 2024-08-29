<x-default-layout title="Ajouter une classe">
    <div class="container my-10">
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <h1 class="flex justify-center">Ajouter une classe</h1>
        <form action="{{ route('admin.classes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input name="nom_classe" label="Nom de la classe" />
            <x-input name="niveau" label="niveau" />
            <button type="submit" class="rounded-md bg-blue-800 px-3 py-2 text-sm
font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-
visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800 m-3">Ajouter</button>
        </form>
        </div>
    </div>
</x-default-layout>
