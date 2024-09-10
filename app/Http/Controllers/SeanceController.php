<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Jour;
use App\Models\Seances;
use App\Models\Enseignants;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuper tous les seances avec les relations enseignant, classe et jour
        $seances = Seances::with('enseignant', 'classe', 'jour')->get();
        return view('admin.seances.index', compact('seances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { {
            $enseignants = Enseignants::all();
            $classes = Classes::with('niveau')->get();
            $jours = Jour::all();
            return view('admin.seances.create', compact('enseignants', 'classes', 'jours'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_enseignant' => 'required',
            'id_classe' => 'required',
            'id_jour' => 'required',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        Seances::create($request->all());
        return redirect()->route('admin.seances.index')->with('success', 'Séance ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seances $seances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seances $seance)
    {

        $enseignants = Enseignants::all();
        $classes = Classes::with('niveau')->get();
        $jours = Jour::all();
        return view('admin.seances.edit', compact('seance', 'enseignants', 'classes', 'jours'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seances $seance)
    {
        $request->validate([
            'id_enseignant' => 'required',
            'id_classe' => 'required',
            'id_jour' => 'required',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        $seance->update($request->all());
        return redirect()->route('admin.seances.index')->with('success', 'Séance mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seances $seance)
    {
        $seance->delete();
        return redirect()->route('admin.seances.index')->with('success', 'Séance supprimée avec succès.');
    }
}
