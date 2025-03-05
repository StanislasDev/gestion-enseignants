<x-default-layout title="liste des présences de l'enseignant {{ $enseignant->nom }}">
    <div class="container mx-auto px-4">
        <!-- Header section -->
        <div class="bg-white shadow-md rounded-lg p-6 my-6">
            <h2 class="text-2xl font-semibold text-gray-800">Liste des présence de M./Mme : <span class="text-red-600">{{ $enseignant->nom }} {{ $enseignant->prenom }}</span></h2>
        </div>

        <!-- Table section -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-red-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Spécialités</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Séance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date de la séance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Heure du début de la séance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Heure d'arrivée</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Heure de départ</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Motif en cas d'absence</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($presences as $presence)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Illuminate\Support\Str::words($presence->seance->classe->name ?? 'N/A', 4, '...') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->seance->titre ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->seance->date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->seance->heure_debut }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->heure_arrivee }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->heure_depart }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->statut->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $presence->motif }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $presences->links('pagination::tailwind') }}
        </div>
        <div>
            <a href="{{ route('enseignant.card', $enseignant->id) }}" class="btn btn-secondary hover:bg-red-400" >Afficher la fiche de présence mensuelle</a>
        </div>
    </div>
    {{-- <div class="container mx-auto px-4">
        <!-- Header section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Fiche de présence de l'enseignant : <span class="text-blue-600">{{ $enseignant->nom }}</span></h2>
            <p class="text-gray-500">Mois : {{ \Carbon\Carbon::now()->format('F Y') }}</p>
        </div>

        <!-- Table section -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 text-left">Jours du mois</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Jours de la semaine</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Heure d'arrivée</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Heure de départ</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Motif</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @for($i = 1; $i <= \Carbon\Carbon::now()->daysInMonth; $i++)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">{{ $i }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ \Carbon\Carbon::createFromDate(null, null, $i)->format('l') }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $presences->where('date', \Carbon\Carbon::createFromDate(null, null, $i)->format('Y-m-d'))->first()->heure_arrivee ?? '' }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $presences->where('date', \Carbon\Carbon::createFromDate(null, null, $i)->format('Y-m-d'))->first()->heure_depart ?? '' }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $presences->where('date', \Carbon\Carbon::createFromDate(null, null, $i)->format('Y-m-d'))->first()->motif ?? '' }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- Observation and Decision Section -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between">
                <div>
                    <p class="font-semibold">Observation du Directeur</p>
                    <textarea class="w-full border border-gray-300 rounded p-2 mt-2" rows="4"></textarea>
                </div>
                <div>
                    <p class="font-semibold">Décision du Promoteur</p>
                    <textarea class="w-full border border-gray-300 rounded p-2 mt-2" rows="4"></textarea>
                </div>
            </div>
        </div>
    </div> --}}
</x-default-layout>
