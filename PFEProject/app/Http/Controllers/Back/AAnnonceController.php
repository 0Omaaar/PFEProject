<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AAnnonceController extends Controller
{
    public function getDailyStats()
    {
        $today = Carbon::now()->format('Y-m-d');

        $addedCount = Annonce::whereDate('created_at', $today)->count();
        $deletedCount = Annonce::withTrashed()->whereDate('deleted_at', $today)->count();

        $addedUsers = User::whereDate('created_at', $today)->count();
        return [
            'addedCount' => $addedCount,
            'deletedCount' => $deletedCount,
            'addedUsers' => $addedUsers,
        ];
    }

    public function index()
    {
        $nombre_annonces = Annonce::count();
        $nombre_users = User::count();

        $daily_stats = $this->getDailyStats();
        $annonces_ajoutees = $daily_stats['addedCount'];
        $annonces_supprimees = $daily_stats['deletedCount'];
        $added_users = $daily_stats['addedUsers'];

        return view('admin.index', compact('nombre_annonces', 'nombre_users', 'annonces_ajoutees', 'annonces_supprimees', 'added_users'));
    }
    public function annonces()
    {
        $annonces = Annonce::latest()->where('vendu', false)->paginate(4);
        $nombre_annonces = Annonce::where('vendu', false)->count();

        return view('admin.annonces', compact('annonces', 'nombre_annonces'));
    }

    public function statsAnnonce()
    {
        $nombre_annonces = Annonce::all()->count();
        $nombre_etat_active = Annonce::where('etat', '1')->count();
        $nombre_etat_desactive = Annonce::where('etat', '0')->count();

        return view('admin.statistiques.annonces', compact('nombre_annonces', 'nombre_etat_active', 'nombre_etat_desactive'));
    }

    public function statsUser()
    {
        $nombre_users = User::all()->count();
        $nombre_etat_normal = User::where('type', 'normal')->count();
        $nombre_etat_admin = User::where('type', 'admin')->count();

        return view('admin.statistiques.utilisateurs', compact('nombre_users', 'nombre_etat_normal', 'nombre_etat_admin'));
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

        return redirect()->route('admin.annonces')->with("success", "L'annonce '$annonce->titre' est désormais désactivée");
    }

    public function annoncesSupp()
    {
        $annonces_supprimees = Annonce::onlyTrashed()->paginate(3);
        $nombre_annonces_supprimees = Annonce::onlyTrashed()->count();


        return view('admin.annoncesSupp', compact('annonces_supprimees', 'nombre_annonces_supprimees'));
    }

    public function annoncesVend()
    {
        $annonces_vendues = Annonce::where('vendu', true)->paginate(4);
        $nombre_annonces_vendues = Annonce::where('vendu', true)->get()->count();

        return view('admin.annoncesVend', compact('annonces_vendues', 'nombre_annonces_vendues'));
    }

    public function restore(Request $request, $id)
    {
        $annonce = Annonce::withTrashed()->find($id);
        $annonce->restore();
        return redirect()->route('admin.annonces')->with("success", "L'annonce est restauree");
    }

    public function SupprimerDef($id)
    {
        Annonce::withTrashed()->find($id)->forceDelete();

        return redirect()->route('admin.annonces')->with("success", "L'annonce est supprimee definitivement");
    }
}