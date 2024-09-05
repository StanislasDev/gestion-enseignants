<x-default-layout title="Ajouter une séance">
    <div class="container my-10">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <h1>Ajouter une Séance</h1>
    <form action="{{ route('admin.seances.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_enseignant">Enseignant</label>
            <select name="id_enseignant" id="id_enseignant" class="form-control" required>
                @foreach($enseignants as $enseignant)
                    <option value="{{ $enseignant->id }}">{{ $enseignant->nom }} {{ $enseignant->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_classe">Classe</label>
            <select name="id_classe" id="id_classe" class="form-control" required>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id }}">{{ $classe->nom_classe }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="heure_debut">Heure de Début</label>
            <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
        </div>
        <div class="form-group">
            <label for="heure_fin">Heure de Fin</label>
            <input type="time" class="form-control" id="heure_fin" name="heure_fin" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    </div>
    </div>
</x-default-layout>
