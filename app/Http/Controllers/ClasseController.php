<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Models\Option;
use App\Models\Classes;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // $classes = Classes::with('option', 'niveau')->get();
        // return view('admin.classes.index', compact('classes'));
        $classes = Classes::with(['option', 'niveau'])->get();
        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $options = Option::all();
        $niveaux = Niveau::all();
        return view('admin.classes.form', compact('options','niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:classes,name',
            'option_id' => 'required|exists:options,id',
            'niveau_id' => 'required|exists:niveaux,id',
        ]);

        $option = Option::find($request->option_id);
        $niveau = Niveau::find($request->niveau_id);
        $className = Classes::generateClassName($option->nom, $niveau->nom);

        Classes::create([
            'name' => $className,
            'option_id' => $request->option_id,
            'niveau_id' => $request->niveau_id,
        ]);

        return redirect()->route('admin.classes.index')->with('success', 'Classe ajoutée avec succès.');
        // Validation des données
    //     $validator = Validator::make($request->all(), [
    //     'nom_classe' => 'required|string|max:255|unique:classes,nom_classe',
    //     'niveau_id' => 'required|exists:niveaux,id',
    // ]);

    // if ($validator->fails()) {
    //     return response()->json($validator->errors(), 422);
    // }

    // // Vérifier si la classe existe déjà
    // $existingClass = Classes::where('nom_classe', $request->nom_classe)
    //                         ->where('niveau_id', $request->niveau_id)
    //                         ->first();

    //     if ($existingClass) {
    //         return response()->json(['message' => 'Cette classe existe déjà.'], 409);
    //     }

    //     // Créer la classe
    //     $classe = Classes::create([
    //     'nom_classe' => $request->nom_classe,
    //     'niveau_id' => $request->niveau_id,
    // ]);

    // return response()->json($classe, 201);

        // Classes::create($request->all());
        // return redirect()->route('admin.classes.index')->withStatus('La classe a été ajoutée avec succès');
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
        $options = Option::all();
        $niveaux = Niveau::all();
        return view('admin.classes.edit', compact('options', 'class', 'niveaux'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name',
            'option_id' => 'required|exists:options,id',
            'niveau_id' => 'required|exists:niveaux,id',
        ]);

        $option = Option::find($request->option_id);
        $niveau = Niveau::find($request->niveau_id);
        $className = Classes::generateClassName($option->nom, $niveau->nom);

        $class->update([
            'name' => $className,
            'option_id' => $request->option_id,
            'niveau_id' => $request->niveau_id,
        ]);
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
