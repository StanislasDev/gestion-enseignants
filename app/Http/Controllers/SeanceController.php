<?php

namespace App\Http\Controllers;

use App\Models\Classes;
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
        $seances = Seances::with('classe')->get();
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        $heures = ['08h:00', '09h:00', '10h:00', '11h:00', '12:00', '13h:00', '14h:00', '15h:00', '16h:00', '17h:00'];
        return view('admin.seances.index', compact('seances', 'jours', 'heures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            $enseignants = Enseignants::all();
            $classes = Classes::all();
            return view('admin.seances.create', compact('enseignants', 'classes'));
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
    public function edit(Seances $seances)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seances $seances)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seances $seances)
    {
        //
    }
}
