<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Annonce;
use App\Models\Image;
use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Option;
use App\Models\Commentaire;
use App\Models\Favorite;


class AnnonceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'parMarque', 'search']);
    }


    public function index()
    {
        $annonces = Annonce::latest()->get();
        $marques = Marque::all();
        $modeles = Modele::all();
        $favorites = Favorite::where('user_id', Auth::id())->pluck('annonce_id');

        return view('index', compact('annonces', 'marques', 'modeles', 'favorites'));
    }

    public function parMarque($id)
    {
        $annonces = Annonce::whereHas('voiture.marque', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        $marques = Marque::all();
        $modeles = Modele::all();

        $marque_choisie = Marque::find($id);

        return view('annonces.index', compact('annonces', 'marques', 'modeles', 'marque_choisie'));
    }


    public function create()
    {
        $modeles = Modele::all();
        $marques = Marque::all();
        $options = Option::all();
        return view('annonces.ajouter_annonce', compact('modeles', 'marques', 'options'));
    }


    public function store(Request $request)
    {
        // Réccupération de l'id de l'utilisateur connécté.
        $user_id = Auth::id();

        // Validation des données envoyées par le formulaire.
        $validatedData = $request->validate([
            "titre" => "required",
            "description" => "required",
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
            "images.*" => "required|image|max:8192",
            "images[]",
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

        // Ajouter les options sélectionnées à la voiture
        if ($request->has('options')) {
            $voiture->options()->sync($request->input('options'));
        }

        // Enregistrer la miniature dans le dossier public/images/miniature
        $miniature = $request->file('miniature');
        $nom_miniature = uniqid() . '.' . $miniature->getClientOriginalExtension();
        $miniature->move(public_path('images/miniature'), $nom_miniature);

        // Créer une nouvelle annonce avec les données validées
        $annonce = new Annonce([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'prix' => $request->prix,
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
        return redirect()->route('annonces.index')->with("success", "Votre annonce a été ajoutée avec succès. Elle sera examinée par l'administrateur avant d'être activée.");
    }

    public function show(Annonce $annonce)
    {
        if (auth()->check()) {
            $user = auth()->user();

            if (!$user->vues()->where('annonce_id', $annonce->id)->exists()) {
                $annonce->increment('vues');
                $user->vues()->attach($annonce->id);
            }
        }

        $commentaires = $annonce->commentaire;
        $options = $annonce->voiture->options;
        return view('annonces.annonce', compact('annonce', 'options', 'commentaires'));
    }

    //creer un commentaire
    public function createCommentaire(Request $request, Annonce $annonce)
    {
        $user_id = Auth::id();

        $validated_data = $request->validate([
            "contenu" => "required|max:300",
        ]);

        $commentaire = new Commentaire([
            'contenu' => $validated_data['contenu'],
            'user_id' => $user_id,
            'annonce_id' => $annonce->id,
        ]);

        $annonce->commentaire()->save($commentaire);

        return redirect()->route('annonces.show', ['annonce' => $annonce->id])->with('success', 'Commentaire ajouté');
    }

    public function deleteCommentaire($id)
    {
        $commentaire = Commentaire::findOrFail($id);

        if ($commentaire->user_id === auth()->user()->id) {
            $commentaire->delete();
            return redirect()->back()->with('success', 'Commentaire supprimé');
        } else {
            return redirect()->back()->with('success', 'Vous n\'êtes pas autorisé à supprimer ce commentaire');
        }
    }

    public function edit(Annonce $annonce)
    {
        $modeles = Modele::all();
        $marques = Marque::all();
        $options = Option::all();
        $selectedOptions = $annonce->voiture->options()->pluck('option_id')->toArray();

        return view('annonces.modifier_annonce', compact('marques', 'modeles', 'annonce', 'options', 'selectedOptions'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $user_id = Auth::id();

        $validatedData = $request->validate([
            "titre" => "required",
            "description" => "required",
            "miniature" => "image|max:8192",
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
            "images.*" => "image|max:8192",
            "images[]",
        ]);

        // Modifier la voiture associée à l'annonce
        $voiture = $annonce->voiture;
        $voiture->update([
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

        // Supprimer les options associées à la voiture de l'annonce
        $voiture->options()->detach();

        // Enregistrer les options sélectionnées pour la voiture de l'annonce
        if ($request->has('options')) {
            $options = $request->input('options');
            $voiture->options()->attach($options);
        }

        // Enregistrer la miniature si elle a été modifiée
        if ($request->hasFile('miniature')) {
            $old_miniature = $annonce->miniature; // récupère le nom de l'ancienne image
            if ($old_miniature !== null) {
                $old_path = public_path('images/miniature/' . $old_miniature);
                if (file_exists($old_path)) {
                    unlink($old_path); // supprime l'ancienne image
                }
            }

            $miniature = $request->file('miniature');
            $nom_miniature = uniqid() . '.' . $miniature->getClientOriginalExtension();
            $miniature->move(public_path('images/miniature'), $nom_miniature);
        } else {
            $nom_miniature = $annonce->miniature;
        }

        // Modifier les données de l'annonce
        $annonce->update([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'prix' => $request->prix,
            'miniature' => $nom_miniature,
            'user_id' => $user_id,
            'voiture_id' => $voiture->id
        ]);

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

        return redirect()->route('annonces.show', $annonce->id)->with('success', "Votre annonce a été modifiée avec succès");
    }

    public function destroy(Annonce $annonce)
    {
        $ancien_nom = $annonce->miniature;
        Storage::disk('public')->delete('images/miniature/' . $ancien_nom);

        $images_voiture = $annonce->image;

        foreach ($images_voiture as $image) {
            Storage::disk('public')->delete('images/images/' . $image->chemin);
            $image->delete();
        }
        $annonce->delete();

        return redirect()->route('annonces.index')->with('success', "Votre annonce '$annonce->titre' a été supprimée avec succès");
    }

    public function search(Request $request)
    {
        $annonces = Annonce::query();

        if ($request->filled('marque_id')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->whereHas('marque', function ($query) use ($request) {
                    $query->where('id', $request->marque_id);
                });
            });
            $marque_id = $request->input('marque_id');
        }

        if ($request->filled('modele_id')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->whereHas('modele', function ($query) use ($request) {
                    $query->where('id', $request->modele_id);
                });
            });
            $modele_id = $request->input('modele_id');
        }

        if ($request->filled('ville')) {
            $annonces->whereHas('user', function ($query) use ($request) {
                $query->where('ville', 'like', '%' . $request->ville . '%');
            });
            $ville = $request->input('ville');
        }

        if ($request->filled('prix_min') && $request->filled('prix_max')) {
            $prix_min = $request->input('prix_min');
            $prix_max = $request->input('prix_max');

            $validator = Validator::make($request->all(), [
                'prix_min' => 'numeric',
                'prix_max' => 'numeric',
            ]);

            $validator->after(function ($validator) use ($request) {
                $prix_min = $request->input('prix_min');
                $prix_max = $request->input('prix_max');

                if ($prix_min > $prix_max) {
                    $validator->errors()->add('prix_max', 'Le prix maximal doit être supérieur au prix minimal');
                }
            });

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $annonces->where('prix', '>=', $prix_min)->where('prix', '<=', $prix_max);
        } elseif ($request->filled('prix_min')) {
            $prix_min = $request->input('prix_min');
            $annonces->where('prix', '>=', $prix_min);
        } elseif ($request->filled('prix_max')) {
            $prix_max = $request->input('prix_max');
            $annonces->where('prix', '<=', $prix_max);
        }

        if ($request->filled('carburant')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->where('carburant', $request->carburant);
            });
            $carburant = $request->input('carburant');
        }

        if ($request->filled('transmission')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->where('transmission', $request->transmission);
            });
            $transmission = $request->input('transmission');
        }

        if ($request->filled('annee_min')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->where('annee', '>=', $request->annee_min);
            });
            $annee_min = $request->input('annee_min');
        }

        if ($request->filled('annee_max')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->where('annee', '<=', $request->annee_max);
            });
            $annee_max = $request->input('annee_max');
        }

        if ($request->filled('puissance_fiscale')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->where('puissance_fiscale', $request->puissance_fiscale);
            });
            $puissance_fiscale = $request->input('puissance_fiscale');
        }

        if ($request->filled('type')) {
            $annonces->whereHas('voiture', function ($query) use ($request) {
                $query->where('type', $request->type);
            });
            $type = $request->input('type');
        }

        $annonces = $annonces->get();

        $marques = Marque::all();
        $modeles = Modele::all();
        $favorites = Favorite::where('user_id', Auth::id())->pluck('annonce_id');

        $parameters = [
            'annonces' => $annonces,
            'marques' => $marques,
            'modeles' => $modeles,
            'favorites' => $favorites,
            'marque_id' => isset($marque_id) ? $marque_id : null,
            'modele_id' => isset($modele_id) ? $modele_id : null,
            'ville' => isset($ville) ? $ville : null,
            'prix_max' => isset($prix_max) ? $prix_max : null,
            'prix_min' => isset($prix_min) ? $prix_min : null,
            'carburant' => isset($carburant) ? $carburant : null,
            'transmission' => isset($transmission) ? $transmission : null,
            'annee_min' => isset($annee_min) ? $annee_min : null,
            'annee_max' => isset($annee_max) ? $annee_max : null,
            'puissance_fiscale' => isset($puissance_fiscale) ? $puissance_fiscale : null,
            'type' => isset($type) ? $type : null,
        ];

        return view('annonces.recherche', $parameters);
    }

    public function toggle(Request $request)
    {
        $annonceId = $request->input('annonce_id');
        $user = auth()->user();

        // Vérifie si l'utilisateur a déjà ajouté ce favori
        $favori = Favorite::where('user_id', $user->id)
            ->where('annonce_id', $annonceId)
            ->first();

        if ($favori) {
            // Le favori existe, donc on le supprime
            $favori->delete();
            $action = 'removed';
        } else {
            // Le favori n'existe pas, donc on le crée
            Favorite::create([
                'user_id' => $user->id,
                'annonce_id' => $annonceId,
            ]);
            $action = 'added';
        }

        return response()->json([
            'success' => true,
            'action' => $action,
        ]);
    }

    public function favorites()
    {
        $userId = auth()->user()->id;

        // Récupérer les ID des favoris de l'utilisateur
        $favorites = Favorite::where('user_id', $userId)->pluck('annonce_id');

        // Récupérer les annonces correspondantes aux favoris
        $annonces = Annonce::whereIn('id', $favorites)->get();

        // Passer les annonces et les ID des favorites à la vue
        return view('annonces.favorites', compact('annonces', 'favorites'));
    }

    public function nombreFavorites()
    {
        $userId = auth()->user()->id;
        $nombreFavorites = Favorite::where('user_id', $userId)->count();
        return $nombreFavorites;
    }
}