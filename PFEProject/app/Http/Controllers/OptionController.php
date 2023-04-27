<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(){
        $options = Option::all();

        return view('admin.options.options', compact('options'));
    }

    public function create()
    {
        return view('admin.options.ajouter_option');
    }

    public function store(Request $request)
    {

        // Validation des données envoyées par le formulaire.
        $validatedData = $request->validate([
            "nom" => "required",
        ]);

        // Créer une nouvelle option avec les données validées
        $option = new Option([
            'nom' => $validatedData['nom'],
        ]);
        $option->save();

        return redirect()->route('admin.options')->with("success", "L'option a été ajoutée avec succès");
        
    }

    public function destroy(Option $option)
    {
        $option->delete();

        return redirect()->back()->with('success', "L'option '$option->nom' a été supprimée avec succès");
    }
}
