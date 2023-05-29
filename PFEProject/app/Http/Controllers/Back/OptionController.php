<?php

namespace App\Http\Controllers\Back;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    public function index(){
        $options = Option::paginate(4);
        $total_options = Option::count();

        return view('admin.options.options', compact('options', 'total_options'));
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
