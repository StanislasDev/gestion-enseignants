<x-default-layout>
    <div class="">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Settings</h1>
                <hr class="mb-4" />

                <div class="container">
                    <h1 class="flex justify-center text-2xl text-blue-500">Liste des Enseignants</h1>
                    <a href="{{ route('admin.enseignants.create') }}" class="btn btn-primary mb-2">Ajouter un Enseignant</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enseignants as $enseignant)
                                <tr>
                                    <td>{{ $enseignant->id }}</td>
                                    <td>{{ $enseignant->nom }}</td>
                                    <td>{{ $enseignant->prenom }}</td>
                                    <td>{{ $enseignant->email }}</td>
                                    <td>{{ $enseignant->telephone }}</td>
                                    <td>
                                        <a href="{{ route('admin.enseignants.edit', $enseignant->id) }}" class="btn btn-warning" target="blank">Modifier</a>
                                        <form x-ref="delete" action="{{ route('admin.enseignants.destroy', $enseignant->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" @click.prevent="$ref.delete.submit()" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant?');">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--//row-->
                
</x-default-layout>
