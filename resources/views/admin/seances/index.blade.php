<x-default-layout>
    <div class="container my-10">
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <h1 class="text-2xl text-blue-500 mb-2">Emploi du Temps</h1>
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
                @foreach($heures as $heure)
                    <tr>
                        <td>{{ $heure }}</td>
                        @foreach($jours as $jour)
                            <td>
                                @foreach($seances as $seance)
                                    @if($seance->date == $jour && $seance->heure_debut == $heure)
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
        </table>
        </div>
    </div>
</x-default-layout>