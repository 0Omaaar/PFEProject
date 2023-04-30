<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class MarqueController extends Controller
{
    public function index(){
        $marques = Marque::all();

        return view('admin.marques.marques', compact('marques'));
    }

    public function create()
    {
        return view('admin.marques.ajouter_marque');
    }

    public function store(Request $request)
    {

        // Validation des données envoyées par le formulaire.
        $validatedData = $request->validate([
            "nom" => "required",
            "logo" => "required|image|mimes:jpg, jpeg, png",
        ]);

        // Enregistrer la miniature dans le dossier public/images/logos
        $nom_logo = $validatedData['logo']->hashName();
        Image::make($validatedData['logo'])->resize(50, 30)->save(public_path('images/logos/'. $nom_logo));

        // Créer une nouvelle marque avec les données validées
        $marque = new Marque([
            'nom' => $validatedData['nom'],
            'logo' => $nom_logo
        ]);
        $marque->save();

        return redirect()->route('admin.marques')->with("success", "La marque a été ajoutée avec succès");
        
    }

    public function destroy(Marque $marque)
    {
        // $marque->modele()->delete();
        // $marque->delete();

        $ancien_logo = Marque::findOrFail($marque->id)->logo;
        Storage::disk('public')->delete('images/logos/'.$ancien_logo);

        Marque::findOrFail($marque->id)->delete();

        return redirect()->back()->with('success', "La marque '$marque->nom' a été supprimée avec succès");
    }
}
