<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function rendreAdmin(User $user){
        $user->type = 'admin';
        $user->save();

        return redirect()->route('admin.users')->with("success", "L'utilisateur '$user->prenom' est désormais un admin");
    }


    public function rendreNormal(User $user){
        $user->type = 'normal';
        $user->save();

        return redirect()->route('admin.users')->with("success", "L'utilisateur '$user->prenom' est désormais utilisateur normal");
    }
}
