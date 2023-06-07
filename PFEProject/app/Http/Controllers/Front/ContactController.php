<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nom" => "required",
            "email" => "required|email",
            "objet" => "required",
            "message" => "required",
        ]);

        $contact = new Contact([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'objet' => $validatedData['objet'],
            'message' => $validatedData['message'],
        ]);
        $contact->save();

        return redirect()->route('annonces.index')->with("success", "Votre message a été envoyé avec succès");
    }
}