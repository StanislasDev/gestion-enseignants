<x-default-layout title="Fiche de présence de M./Mme {{ $enseignant->nom }} {{ $enseignant->prenom }}">
    <div id="print-section" class="container mx-auto px-4 pt-4">
        <!-- Header section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Fiche de présence mensuelle de l'enseignant : <span class="text-red-600">{{ $enseignant->nom }} {{ $enseignant->prenom }}</span></h2>
                <p class="text-gray-500">Mois : {{ now()->format('F Y') }}</p>
            </div>
            <!-- Bouton d'impression -->
            <button onclick="printDiv()" class="btn btn-secondary flex items-center hover:bg-red-600 print:hidden">
                <svg version="1.1" viewBox="0 0 2048 2048" width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                    <path transform="translate(717,451)" d="m0 0h611l14 2 12 6 8 8 6 12 2 10v238h120l23 2 11 4 11 7 8 8 7 12 2 11v596l-1 13-3 10-7 11-7 7-10 6-9 3-11 2-133 1-1 142-2 13-6 11-6 7-10 6-13 3h-619l-12-3-7-4-8-7-6-10-3-12-1-146-135-1-14-3-10-5-9-7-9-13-3-7-1-6v-606l4-16 6-9 6-7 13-8 9-3 19-2h125v-239l3-13 7-11 9-7 8-4zm40 78-1 3v196h535l1-1v-87l-1-111zm-119 289-38 1-1 4v506h77l2-2 1-256 3-12 5-9 7-7 12-6 4-1h626l13 4 9 7 7 10 3 10 1 6 1 255 78 1v-510l-704-1zm119 294-1 1v411l145 1h388l3-2v-410l-4-1z"/>
                    <path transform="translate(845,1358)" d="m0 0h358l13 3 13 8 8 9 5 10 2 7v14l-4 13-8 10-7 6-10 5-13 3h-357l-16-4-10-7-7-7-7-14-1-5v-14l4-12 6-9 7-7 11-6z"/>
                    <path transform="translate(845,1204)" d="m0 0h357l14 3 9 5 10 9 7 12 2 8v14l-4 12-6 9-9 8-10 5-8 2-9 1h-351l-15-3-9-5-10-9-7-12-2-8v-14l3-10 7-12 8-7 13-6z"/>
                    </svg> Imprimer la fiche
            </button>
        </div>
    
        <!-- Table section -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-red-200">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 text-left">Jour</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Date de la séance</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Heure de début de séance</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Heure d'arrivée</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Heure de départ</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Statut</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Motif en cas d'absence</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($joursDuMois as $jour)
                        @php
                            $presence = $presences->where('date', $jour->toDateString())->first();
                        @endphp
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">
                                {{ $jour->format('j (l)') }} <!-- Ex: 1 (Monday) -->
                            </td>
    
                            @if($presence)
                                <td class="px-4 py-2 border border-gray-300">
                                    {{ \Carbon\Carbon::parse($presence->seance->date)->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300">
                                    {{ \Carbon\Carbon::parse($presence->seance->heure_debut)->format('H:i') }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300">
                                    {{ $presence->heure_arrivee ? \Carbon\Carbon::parse($presence->heure_arrivee)->format('H:i') : 'Non renseignée' }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300">
                                    {{ $presence->heure_depart ? \Carbon\Carbon::parse($presence->heure_depart)->format('H:i') : 'Non renseignée' }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300">
                                    {{ $presence->statut->nom }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300">
                                    {{ $presence->motif }}
                                </td>
                            @else
                                <td colspan="5" class="px-4 py-2 border border-gray-300 text-center text-gray-500">
                                    Aucun enregistrement
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Media Query pour ne pas afficher le bouton d'impression lors de l'impression -->
    <style>
        @media print {
            .print:hidden {
                display: none;
            }
        }
    </style>
    
    <script>
        function printDiv() {
            var printContents = document.getElementById("print-section").innerHTML;
            var originalContents = document.body.innerHTML;
    
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();  // Recharge la page pour restaurer les événements JavaScript
        }
    </script>
    
</x-default-layout>