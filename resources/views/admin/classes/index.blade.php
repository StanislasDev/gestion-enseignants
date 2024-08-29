<x-default-layout title="Liste des salles de classes">
    <div class="container my-10">
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <h1 class="flex justify-center text-2xl text-blue-500">Liste des Classes</h1>
        <a href="{{ route('admin.classes.create') }}" class="btn btn-primary mb-2">Ajouter une Classe</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de la Classe</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $classe)
                    <tr>
                        <td>{{ $classe->id }}</td>
                        <td>{{ $classe->nom_classe }}</td>
                        <td>{{ $classe->niveau }}</td>
                        <td>
                            <a href="{{ route('admin.classes.edit', $classe->id) }}" class="btn btn-warning">Modifier</a>
                            <form x-ref="delete" action="{{ route('admin.classes.destroy', $classe->id) }}" method="POST" style="display:inline;">
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
    </div>
</x-default-layout>