<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function rendreAdmin(User $user){
        $user->type = 'admin';
        $user->save();

        return redirect()->route('admin.users')->with("success", "L'utilisateur '$user->prenom' est maintenant un admin");
    }


    public function rendreNormal(User $user){
        $user->type = 'normal';
        $user->save();

        return redirect()->route('admin.users')->with("success", "L'utilisateur '$user->prenom' est maintenant utilisateur normal");
    }
}
