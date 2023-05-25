<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annonce;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Favorite;


class ProfilController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $user = auth()->user();
        $annonces = Annonce::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $favorites = Favorite::where('user_id', $user->id)->pluck('annonce_id');

        return view('profil.profil', compact('user', 'annonces', 'favorites'));
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        $user_id = auth()->user()->id;

        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'actual_password' => 'sometimes',
            'password' => 'sometimes|confirmed',
            'password_confirmation' => 'sometimes|required_with:password',
            'telephone' => 'required',
            'ville' => 'required',
        ]);

        // Modifier les informations de l'utlisateur
        $user = User::find($user_id);
        $user->update([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'prenom' => $validatedData['prenom'],
            'telephone' => $validatedData['telephone'],
            'ville' => $validatedData['ville']
        ]);

        // Modifier le mot de psse de l'utlisateur si il a été envoyé
        if (isset($validatedData['password']) && isset($validatedData['actual_password'])) {

            if (Hash::check($validatedData['actual_password'], $user->password)) {
                $user->update([
                    'password' => Hash::make($validatedData['password'])
                ]);
            }
            else{
                return redirect()->back()->withErrors(['actual_password' => 'Le mot de passe actuel est incorrect']);
            }
        }

        return redirect()->back()->with('success', "Vos informations personnelles ont bien été modifiées");
    }

    public function destroy(string $id)
    {
        //
    }
}
