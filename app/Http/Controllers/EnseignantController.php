<?php

namespace App\Http\Controllers;

use App\Models\Enseignants;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.enseignants.index', [
            'enseignants' => Enseignants::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.enseignants.form');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignants $enseignant)
    {
        return view('admin.enseignants.edit', compact('enseignant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, )
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:enseignants',
            'telephone' => 'required',
        ]);

        Enseignants::create($request->all());

        return redirect()->route('admin.enseignants.index')->with('success', 'Enseignant ajouté avec succès');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enseignants $enseignant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
        ]);

        $enseignant->update($request->all());

        return redirect()->route('admin.enseignants.index')->with('success', 'Enseignant modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignants $enseignant)
    {
        $enseignant->delete();

        return redirect()->route('admin.enseignants.index')->with('success', 'Enseignant supprimé avec succès');
    }
}
