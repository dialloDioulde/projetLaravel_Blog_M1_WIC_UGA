<?php

namespace App\Http\Controllers;
use App\contact;
use App\Http\Requests\ContactRequest;
use App\posts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Pour les demandes de Rendez-vous
    public function show(){
        $contact = contact::all();
        return view('email_contact', ['contacts' => $contact]);
    }

    //
    public function create(){
        return view('contact');
    }

    // Pour enregistrer les contacts

    public function store(ContactRequest $request){

        $contact = new contact;
        $contact->contact_name = $request->contact_name;
        $contact->contact_email = $request->contact_email;
        $contact->contact_message = $request->contact_message;

        $contact->save();

        return view('confirm');
    }
}





