<?php

namespace App\Http\Controllers\presence;

use App\Models\Statut;
use App\Models\Seances;
use App\Models\Presences;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Récupérer toutes les présences des enseignants
        $presences = Presences::with(['enseignant', 'seance'])->get();

        // Retourner la vue avec les données
        return view('admin.presences.index', compact('presences'));

    }

    public function create($id)
    {
        $seance = Seances::findOrFail($id);
        $enseignant = $seance->enseignant;

        return view('admin.presences.create', compact('seance', 'enseignant'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'heure_arrivee' => 'date_format:H:i',
            'heure_depart' => 'nullable|date_format:H:i|after:heure_arrivee',
            'motif' => 'nullable|string|max:255',
            'id_statut' => 'required|exists:statuts,nom',
            'id_enseignant' => 'required|exists:enseignants,id',
            'id_seance' => 'required|exists:seances,id',
        ]);


        $presenceExist = presences::where('id_enseignant', $request->id_enseignant)
            ->where('id_seance', $request->id_seance)->first();
        if ($presenceExist) {
            return redirect()->route('presence.create', $id)->with('error', 'La présence existe déjà pour cet enseignant et cette séance.');
        }

        $seance = Seances::findOrFail($id);
        $heureArrivee = new \DateTime($request->heure_arrivee);
        $heureDebut = new \DateTime($seance->heure_debut);
        $heureFin = new \DateTime($seance->heure_fin);
        $datePresence = $request->date;
        $dateSeance = $seance->date;

        $statut = $request->id_statut;

        $statutModel = Statut::where('nom', $statut)->first();

        $presence = new Presences();
        $presence->id_seance = $id;
        $presence->date = $request->date;
        $presence->heure_arrivee = $request->heure_arrivee;
        $presence->heure_depart = $request->heure_depart;
        $presence->id_statut = $statutModel->id;
        $presence->motif = $request->motif;
        $presence->id_enseignant = $request->id_enseignant;
        $presence->save();

        return redirect()->route('admin.presences.index', $id)->with('success', 'Présence enregistrée avec succès');
    }

    public function edit($id, $presence_id)
    {
        $presence = Presences::with('statut')->findOrFail($presence_id);
        $seance = $presence->seance;
        $enseignant = $presence->enseignant;
        $statuts = Statut::all();

        return view('admin.presences.edit', compact('presence', 'seance', 'enseignant', 'statuts'));
    }

    public function update(Request $request, $id, $presence_id)
    {
        $request->validate([
            'date' => 'required|date',
            'heure_arrivee' => 'nullable|date_format:H:i',
            'heure_depart' => 'nullable|date_format:H:i|after:heure_arrivee',
            'motif' => 'nullable|string|max:255',
            'id_statut' => 'required|exists:statuts,nom',
            'id_enseignant' => 'required|exists:enseignants,id',
            'id_seance' => 'required|exists:seances,id',
        ]);

        // Trouver l'enregistrement de présence à mettre à jour
        $presence = Presences::findOrFail($presence_id);

        // Vérifier que l'enseignant et la séance correspondent
        if ($presence->id_enseignant != $request->id_enseignant || $presence->id_seance != $request->id_seance) {
            return redirect()->route('presence.edit', [$id, $presence_id])
                ->with('error', 'L\'enseignant ou la séance ne correspondent pas.');
        }
        $id_statut = Statut::where('nom', $request->id_statut)->first()->id;
        // Mettre à jour l'enregistrement de présence
        $presence->date = $request->date;
        $presence->heure_arrivee = $request->heure_arrivee;
        $presence->heure_depart = $request->heure_depart;
        $presence->id_statut = $id_statut;
        $presence->motif = $request->motif;
        $presence->id_enseignant = $request->id_enseignant;
        $presence->save();

        // Rediriger avec succès
        return redirect()->route('admin.presences.index', $id)
            ->with('success', 'Présence mise à jour avec succès');

    }

}
