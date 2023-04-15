<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();
        return view('profil.profil', compact('user'));
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
    public function update(Request $request)
    {
        $user_id = auth()->user()->id;


        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email,'.$user_id,
            'password' => 'required',
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
            'ville' => $validatedData['ville'],
            'password' => Hash::make($validatedData['password'])
        ]);
        

        return redirect()->route('profil.show')->with('success', "Vos informations sont modifiées");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
