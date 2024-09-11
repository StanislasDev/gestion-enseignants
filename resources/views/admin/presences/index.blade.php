<x-default-layout title="Liste de présences des enseignants">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <table class="table ">
        <thead>
            <tr>
                <th>Enseignant</th>
                <th>Sapécialités</th>
                <th>Séance</th>
                <th>Date de la séance</th>
                <th>Date</th>
                <th>Heure du début de la séance</th>
                <th>Heure d'arrivée</th>
                <th>Heure de départ</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presences as $presence)
                <tr>
                    <td>{{ $presence->enseignant->nom }} {{ $presence->enseignant->prenom }}</td>
                    <td>{{ $presence->seance->classe->nom_classe }} ({{ $presence->seance->classe->niveau->nom }})</td>
                    <td>{{ $presence->seance->titre }}</td>
                    <td>{{ $presence->seance->date }}</td>
                    <td>{{ $presence->date }}</td>
                    <td>{{ $presence->seance->heure_debut }}</td>
                    <td>{{ $presence->heure_arrivee }}</td>
                    <td>{{ $presence->heure_depart }}</td>
                    <td>{{ $presence->statut }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</x-default-layout>