<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
        // Rediriger l'utilisateur vers la page qu'il essayait d'atteindre avant d'être redirigé vers la page d'authentification
        return redirect()->intended('/');
        }
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'nom'=>'required',
            'prenom'=>'required',
            'telephone'=>'required',
            'ville'=>'required',
        ]);

        User::create([
            'nom' => $request->get('nom'),
            'email' => $request->get('email'),
            'prenom' => $request->get('prenom'),
            'telephone' => $request->get('telephone'),
            'ville' => $request->get('ville'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->intended('/');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
