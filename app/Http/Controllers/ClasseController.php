<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Models\Classes;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $classes = Classes::with('niveau')->get();
        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialites = ['Génie Logiciel', 'Génie Matériaux', 'Génie Mécanique', 'Génie Informatique', 'Génie Civil', 'Génie Chimique', 'Génie Electrique', 'Génie Biomédical'];
        $niveaux = Niveau::all();
        return view('admin.classes.form', compact('specialites','niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_classe' => 'required|string',
            'niveau_id' => 'required',
        ]);

        Classes::create($request->all());
        return redirect()->route('admin.classes.index')->withStatus('La classe a été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $class)
    {
        $specialites = ['Génie Logiciel', 'Génie Matériaux', 'Génie Mécanique', 'Génie Informatique', 'Génie Civil', 'Génie Chimique', 'Génie Electrique', 'Génie Biomédical'];
        $niveaux = Niveau::all();
        return view('admin.classes.edit', compact('specialites', 'class', 'niveaux'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'nom_classe' => 'required|string',
            'niveau_id' => 'required|string',
        ]);

        $class->update($request->all());
        return redirect()->route('admin.classes.index')->withStatus('La classe a été modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('admin.classes.index')->withStatus('La classe a été supprimée avec succès');
    }
}
