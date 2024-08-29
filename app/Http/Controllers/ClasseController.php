<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        return view('admin.classes.index', [
            'classes' => Classes::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classes.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_classe' => 'required|string',
            'niveau' => 'required|string',
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
        return view('admin.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'nom_classe' => 'required|string',
            'niveau' => 'required|string',
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
