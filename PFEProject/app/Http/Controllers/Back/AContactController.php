<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);

        return view('admin.contact.index', compact('contacts'));
    }


    public function rendreLu(Contact $contact)
    {
        $contact->statut = "Lu";
        $contact->save();

        return redirect()->back()->with('success', 'Le message est declaré comme lu !');
    }

    public function rendreNonLu(Contact $contact)
    {
        $contact->statut = "Non Lu";
        $contact->save();

        return redirect()->back()->with('success', 'Le message est declaré comme non lu !');
    }
    
    public function rendretraite(Contact $contact)
    {
        $contact->statut = "Traité";
        $contact->save();

        return redirect()->back()->with('success', 'Le message est declaré comme traité !');
    }
}