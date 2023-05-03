<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AAnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::latest()->get();

        return view('admin.index', compact('annonces'));
    }

    public function show(Annonce $annonce)
    {
        return view('admin.annonce', compact('annonce'));
    }

    public function activer(Annonce $annonce)
    {
        $annonce->etat = 1;
        $annonce->save();

        return redirect()->route('admin.index')->with("success", "L'annonce '$annonce->titre' est désormais activée");
    }

    public function desactiver(Annonce $annonce)
    {
        $annonce->etat = 0;
        $annonce->save();

        return redirect()->route('admin.index')->with("success", "L'annonce '$annonce->titre' est désormais desactivée");
    }
}
