<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function adminContacts() 
    {
        $contacts = ContactModel::all();

        return view('allContacts', compact('contacts'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string|min:5'
        ]);

        //echo "Email: ".$request->get('email'). " Naslov: ". $request->get('subject'). " Poruka: ". $request->get('message');

        ContactModel::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);

        return redirect('/shop');
    }

    public function delete($contact)
    {
        $oneContact = ContactModel::where(['id' => $contact])->first();

        if($oneContact === null) die("Ovaj kontakt ne postoji");

        $oneContact->delete();

        return redirect()->back();
    }
}
