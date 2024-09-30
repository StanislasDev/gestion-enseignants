<x-default-layout title="Liste de présences des enseignants">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="flex justify-center text-2xl text-blue-600 py-3">Liste de presences des enseignants</h1>
            <table class="min-w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">Enseignants</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Sapécialités</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Séances</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Date de la séance</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Heure du début de la séance</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Heure d'arrivée</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Heure de départ</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Statut</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Mise à jour de la présence</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presences as $presence)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->enseignant->nom }} {{ $presence->enseignant->prenom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->seance->classe->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->seance->titre }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->seance->date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->seance->heure_debut }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->heure_arrivee }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->heure_depart }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presence->statut->nom }}</td>
                    <td class="border border-gray-300 px-4 py-2"><a href="{{ route('presence.edit', ['id' => $presence->seance->id, 'presence_id' => $presence->id]) }}">Éditer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <!-- Afficher les liens de pagination -->
        {{ $presences->links() }}
    </table>
        </div>
    </div>
</x-default-layout>