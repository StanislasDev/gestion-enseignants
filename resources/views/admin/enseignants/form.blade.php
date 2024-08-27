<x-default-layout title="Ajouter un enseignant">
    <div class="container my-10">
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <h1 class="flex justify-center">Ajouter un Enseignant</h1>
        <form action="{{ route('admin.enseignants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input name="nom" label="Nom" />
            <x-input name="prenom" label="prenom" />
            <x-input name="email" label="adress e-mail" />
            <x-input name="telephone" label="telephone" />
            <button type="submit" class="rounded-md bg-blue-800 px-3 py-2 text-sm
font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-
visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800 m-3">Ajouter</button>
        </form>
        </div>
    </div>
</x-default-layout>
