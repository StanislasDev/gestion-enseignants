<x-default-layout title="Créer une présence pour la séance : {{ $seance->titre }}">
    <div class="container">
        <h1>Créer une présence pour la séance : {{ $seance->titre }}</h1>
        <h2>pour la spécialité : {{ $seance->classe->name }}</h2>
        <form action="{{ route('presence.store', $seance->id) }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <div class="form-group">
                <label for="enseignant">Enseignant</label>
                <input type="text" class="form-control" id="enseignant"
                    value="{{ $enseignant->nom }} {{ $enseignant->prenom }}" disabled>
                <input type="hidden" name="id_enseignant" value="{{ $enseignant->id }}">
            </div>

            <div class="form-group">
                <label for="date_seance">Date de la séance</label>
                <input type="text" class="form-control" id="date_seance" value="{{ $seance->date }}" disabled>
                <input type="hidden" name="id_seance" value="{{ $seance->id }}">
            </div>

            <div class="form-group">
                <label for="heure_debut">Heure de début</label>
                <input type="text" class="form-control" id="heure_debut" value="{{ $seance->heure_debut }}"
                    disabled>
            </div>

            <div class="form-group">
                <label for="heure_fin">Heure de fin</label>
                <input type="text" class="form-control" id="heure_fin" value="{{ $seance->heure_fin }}" disabled>
            </div>

            <div class="form-group">
                <label for="date">Date de présence</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="heure_arrivee">Heure d'arrivée</label>
                <input type="time" class="form-control" id="heure_arrivee" name="heure_arrivee" required>
            </div>

            <div class="form-group">
                <label for="heure_depart">Heure de départ</label>
                <input type="time" class="form-control" id="heure_depart" name="heure_depart">
            </div>

            <div class="form-group">
                <label for="statut">Statut</label>
                <input class="form-control" id="statut" value="Absent(e)" name="id_statut" readonly>
            </div>

            <div class="form-group" id="motif-container" style="display: none;">
                <label for="motif">Motif</label>
                <input type="text" class="form-control" id="motif" name="motif">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <script>
        function updateStatut() {
            var datePresence = document.getElementById('date').value;
            var dateSeance = '{{ $seance->date }}';
            var heureArrivee = document.getElementById('heure_arrivee').value ? new Date('1970-01-01T' + document
                .getElementById('heure_arrivee').value) : null;
            var heureDebut = new Date('1970-01-01T' + document.getElementById('heure_debut').value);
            var heureFin = new Date('1970-01-01T' + document.getElementById('heure_fin').value);
            var statut = 'Absent(e)';
            if (datePresence === dateSeance) {

                if (heureArrivee) {
                    if (heureArrivee <= heureDebut.setMinutes(heureDebut.getMinutes() + 15)) {
                        statut = 'Présent(e)';
                    } else {
                        statut = 'Retard';
                    }
                } else {
                    statut = 'Absent(e)';
                }
            }

            document.getElementById('statut').value = statut;
            document.getElementById('motif-container').style.display = (statut === 'Absent(e)') ? 'block' : 'none';
            // console.log(div_statut.textContent);

        }
        document.getElementById('heure_arrivee').addEventListener('change', updateStatut);
        document.getElementById('date').addEventListener('change', updateStatut);
    </script>
</x-default-layout>
