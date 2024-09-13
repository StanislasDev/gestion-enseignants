<x-default-layout>
    <div class="container my-10">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            {{-- <h1 class="text-2xl text-blue-500 mb-2">Emploi du Temps</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Heure</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($heures as $heure)
                    <tr>
                        <td>{{ $heure }}</td>
                        @foreach ($jours as $jour)
                            <td>
                                @foreach ($seances as $seance)
                                    @if ($seance->date == $jour && $seance->heure_debut == $heure)
                                        <div class="seance">
                                            <strong>{{ $seance->classe->nom_classe }}</strong><br>
                                            {{ $seance->heure_debut }} - {{ $seance->heure_fin }}
                                        </div>
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table> --}}


            <h1 class="text-2xl font-bold mb-4">Liste des Séances</h1>

            <table class="table min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Titre</th>
                        <th class="py-2 px-4 border-b">Jour</th>
                        <th class="py-2 px-4 border-b">Enseignant</th>
                        <th class="py-2 px-4 border-b">Date</th>
                        <th class="py-2 px-4 border-b">Heure de début</th>
                        <th class="py-2 px-4 border-b">Heure de fin</th>
                        <th class="py-2 px-4 border-b">Niveau de Classe</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seances as $seance)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $seance->titre }}</td>
                            <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($seance->date)->format('l') }}</td>
                            <td class="py-2 px-4 border-b">{{ $seance->enseignant->nom }}
                                {{ $seance->enseignant->prenom }}</td>
                            <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($seance->date)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b">{{ $seance->heure_debut }}</td>
                            <td class="py-2 px-4 border-b">{{ $seance->heure_fin }}</td>
                            <td class="py-2 px-4 border-b">{{ $seance->classe->nom_classe }}
                                ({{ $seance->classe->niveau->nom }})</td>
                            <td class="flex py-2 px-4 border-b">
                                <a href="{{ route('admin.seances.edit', $seance) }}"
                                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400" target="blank">Modifier</a>
                                <form action="{{ route('admin.seances.destroy', $seance) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400" @click.prevent="$ref.delete.submit()" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant?');">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('admin.seances.create') }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ajouter une séance</a>
            </div>
        </div>
    </div>
</x-default-layout>
