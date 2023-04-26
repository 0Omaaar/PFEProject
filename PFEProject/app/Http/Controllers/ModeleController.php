<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    public function index(Marque $marque){
        $modeles = $marque->modele;
    
        return view('admin.modeles.modeles', compact('modeles', 'marque'));
    }

    public function create(Marque $marque)
    {
        return view('admin.modeles.ajouter_modele', compact('marque'));
    }

    public function store(Request $request, Marque $marque)
    {

        // Validation des données envoyées par le formulaire.
        $validatedData = $request->validate([
            "nom" => "required"
        ]);

        // Créer un nouveau modele avec les données validées
        $modele = new Modele([
            'nom' => $validatedData['nom'],
            'marque_id' => $marque->id
        ]);
        $modele->save();

        return redirect()->route('admin.modeles', $marque->id)->with("success", "La marque a été ajoutée avec succès");
        
    }

    public function destroy(Modele $modele)
    {
        $modele->delete();

        return redirect()->back()->with('success', "Le modèle '$modele->nom' a été supprimé avec succès");
    }

}
