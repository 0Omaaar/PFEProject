<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;

class AAnnonceController extends Controller
{

    public function index(){
        $nombre_annonces = Annonce::all()->count();
        $nombre_users = User::all()->count();
        
        return view('admin.index', compact('nombre_annonces', 'nombre_users'));
    }
    public function annonces()
    {
        $annonces = Annonce::latest()->get();

        return view('admin.annonces', compact('annonces'));
    }

    public function statsAnnonce(){
        $nombre_annonces = Annonce::all()->count();
        $nombre_etat_active = Annonce::where('etat', '1')->count();
        $nombre_etat_desactive = Annonce::where('etat', '0')->count();

        return view('admin.statistiques.annonces', compact('nombre_annonces' ,'nombre_etat_active', 'nombre_etat_desactive'));
    }

    public function statsUser(){
        $nombre_users = User::all()->count();
        $nombre_etat_normal = User::where('type', 'normal')->count();
        $nombre_etat_admin = User::where('type', 'admin')->count();

        return view('admin.statistiques.utilisateurs', compact('nombre_users' ,'nombre_etat_normal', 'nombre_etat_admin'));
    }

    public function show(Annonce $annonce)
    {
        $options = $annonce->voiture->options;
        return view('admin.annonce', compact('annonce', 'options'));
    }

    public function activer(Annonce $annonce)
    {
        $annonce->etat = 1;
        $annonce->save();

        return redirect()->route('admin.annonces')->with("success", "L'annonce '$annonce->titre' est désormais activée");
    }

    public function desactiver(Annonce $annonce)
    {
        $annonce->etat = 0;
        $annonce->save();

        return redirect()->route('admin.annonces')->with("success", "L'annonce '$annonce->titre' est désormais desactivée");
    }
}
