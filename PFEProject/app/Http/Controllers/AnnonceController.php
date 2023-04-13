<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Image;
use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }


    public function index()
    {
        $annonces = Annonce::all();
        return view('index', compact('annonces'));
    }

    public function create()
    {
        $modeles = Modele::all();
        $marques = Marque::all();
        return view('annonces.ajouter_annonce', compact('modeles',  'marques'));
    }


    public function store(Request $request)
    {
        // Réccupération de l'id de l'utilisateur connécté.
        $user_id = Auth::id();

        // Validation des données envoyées par le formulaire.
        $validatedData = $request->validate([
            "titre" => "required",
            "description" => "required",
            "prix" => "required",
            "miniature" => "required|image|max:8192",
            "annee" => "required",
            "type" => "required",
            "carburant" => "required",
            "transmission" => "required",
            "kilometrage" => "required",
            "puissance_fiscale" => "required",
            "dedouanee" => "required",
            "premiere_main" => "required",
            'marque_id' => "required",
            'modele_id' => "required",
            "images.*" => "required|image|max:8192", "images[]",
        ]);

        // Créer une nouvelle voiture avec les données validées
        $voiture = new Voiture([
            'annee' => $validatedData['annee'],
            'type' => $validatedData['type'],
            'carburant' => $validatedData['carburant'],
            'transmission' => $validatedData['transmission'],
            'kilometrage' => $validatedData['kilometrage'],
            'puissance_fiscale' => $validatedData['puissance_fiscale'],
            'dedouanee' => $validatedData['dedouanee'],
            'premiere_main' => $validatedData['premiere_main'],
            'modele_id' => $validatedData['modele_id'],
            'marque_id' => $validatedData['marque_id'],
        ]);
        $voiture->save();

        // Enregistrer la miniature dans le dossier public/images/miniature
        $miniature = $request->file('miniature');
        $nom_miniature = uniqid() . '.' . $miniature->getClientOriginalExtension();
        $miniature->move(public_path('images/miniature'), $nom_miniature);

        // Créer une nouvelle annonce avec les données validées
        $annonce = new Annonce([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'prix' => $validatedData['prix'],
            'miniature' => $nom_miniature,
            'user_id' => $user_id,
            'voiture_id' => $voiture->id
        ]);
        $annonce->save();

        // Enregistrer les images de la voiture dans le dossier public/images/images
        foreach ($request->file('images') as $image) {
            $nom_image = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/images'), $nom_image);

            $images_voiture = new Image([
                'chemin' => $nom_image,
                'annonce_id' => $annonce->id
            ]);
            $images_voiture->save();
        }

        return redirect()->route('annonces.index')->with("success", "Annonce Ajoutee");
    }

    public function show(Annonce $annonce)
    {
        return view('annonces.annonce', compact('annonce'));
    }

    public function edit(Annonce $annonce)
    {
        $modeles = Modele::all();
        $marques = Marque::all();
        return view('annonces.modifier_annonce', compact('marques', 'modeles', 'annonce'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $user_id = Auth::id();

        $validatedData = $request->validate([
            "titre" => "required",
            "description" => "required",
            "prix" => "required",
            "miniature" => "required|image|max:8192",
            "annee" => "required",
            "type" => "required",
            "carburant" => "required",
            "transmission" => "required",
            "kilometrage" => "required",
            "puissance_fiscale" => "required",
            "dedouanee" => "required",
            "premiere_main" => "required",
            'marque_id' => "required",
            'modele_id' => "required",
            "images.*" => "required|image|max:8192", "images[]",
        ]);

        // Modifier la voiture associée à l'annonce
        $voiture = $annonce->voiture;
        $voiture->annee = $validatedData['annee'];
        $voiture->type = $validatedData['type'];
        $voiture->carburant = $validatedData['carburant'];
        $voiture->transmission = $validatedData['transmission'];
        $voiture->kilometrage = $validatedData['kilometrage'];
        $voiture->puissance_fiscale = $validatedData['puissance_fiscale'];
        $voiture->dedouanee = $validatedData['dedouanee'];
        $voiture->premiere_main = $validatedData['premiere_main'];
        $voiture->modele_id = $validatedData['modele_id'];
        $voiture->marque_id = $validatedData['marque_id'];
        $voiture->save();

        // Modifier les données de l'annonce
        $annonce->titre = $validatedData['titre'];
        $annonce->description = $validatedData['description'];
        $annonce->prix = $validatedData['prix'];
        $annonce->user_id = $user_id;
        $annonce->voiture_id = $voiture->id;

        // Enregistrer la miniature si elle a été modifiée
        if ($request->hasFile('miniature')) {
            $annonce->image()->delete();
            $miniature = $request->file('miniature');
            $nom_miniature = uniqid() . '.' . $miniature->getClientOriginalExtension();
            $miniature->move(public_path('images/miniature'), $nom_miniature);

            $annonce->miniature = $nom_miniature;
        }

        $annonce->save();

        // Enregistrer les images de la voiture si elles ont été modifiées
        if ($request->hasFile('images')) {
            $annonce->image()->delete();
            foreach ($request->file('images') as $image) {
                $nom_image = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/images'), $nom_image);

                $images_voiture = new Image([
                    'chemin' => $nom_image,
                    'annonce_id' => $annonce->id
                ]);
                $images_voiture->save();
            }
        }

        //redirection
        return redirect()->route('annonces.show', $annonce->id)->with("success", "Annonce modifiée");
    }

    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonces.index')->with('success', "Votre annonce '$annonce->titre' est supprimée avec succes");
    }
}
