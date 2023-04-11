<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Image;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }


    public function index()
    {
        $annonces = Annonce::all();
        $voitures = Voiture::all();
        $images = Image::all();
        $modeles = Modele::all();
        $marques = Marque::all();

        return view('annonces.annonces', compact('annonces', 'voitures', 'images', 'modeles',  'marques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('annonces.ajouter_annonce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user_id = Auth::id();

        $request->validate([
            "titre" => "required",
            "description" => "required",
            "prix" => "required",
            "miniature" => "required",
            "annee"=>"required",
            "type"=>"required",
            "carburant"=>"required",
            "transmission"=>"required",
            "kilometrage"=>"required",
            "puissance_fiscale"=>"required",
            "dedouanee"=>"required",
            "premiere_main"=>"required",
            "modele"=>"required",
            "marque"=>"required",
            "images.*"=>"required|image|max:2048", "images[]",
        ]);

        $marque = new Marque();
        $marque->nom = $request->marque;
        $marque->save();

        $modele = new Modele();
        $modele->nom = $request->modele;
        $modele->marque_id = $marque->id;
        $modele->save();

        $voiture = new Voiture();
        $voiture->annee = $request->annee;
        $voiture->type = $request->type;
        $voiture->carburant = $request->carburant;
        $voiture->transmission = $request->transmission;
        $voiture->kilometrage = $request->kilometrage;
        $voiture->puissance_fiscale = $request->puissance_fiscale;
        $voiture->dedouanee = $request->dedouanee;
        $voiture->premiere_main = $request->premiere_main;
        $voiture->marque_id = $marque->id;
        $voiture->modele_id = $modele->id;
        $voiture->save();


        $annonce = new Annonce();
        $annonce->titre = $request->titre;
        $annonce->description = $request->description;
        $annonce->prix = $request->prix;
        $annonce->user_id = $user_id;
        $annonce->voiture_id = $voiture->id;

        $miniature = $request->file('miniature');
        $nom_miniature = uniqid() . '.' . $miniature->getClientOriginalExtension();
        $miniature->move(public_path('images/miniature'), $nom_miniature);
        $annonce->miniature = $nom_miniature;

        $annonce->save();

        foreach ($request->file('images') as $image) {
            $nom_image = uniqid() . '.' . $image->getClientOriginalExtension();
            // $image->storeAs('public/images', $nom_image);
            $image->move(public_path('images/images'), $nom_image);
            $nouvelle_image = new Image();
            $nouvelle_image->chemin = $nom_image;
            $nouvelle_image->annonce_id = $annonce->id;
            $nouvelle_image->save();
        }



        return redirect()->route('index')->with("success", "Annonce Ajoutee");
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        $voitures = Voiture::all();
        $modeles = Modele::all();
        $marques = Marque::all();
        $images = Image::all();

        return view('annonces.annonce', compact('voitures', 'modeles', 'marques', 'images', 'annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
