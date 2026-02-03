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
}
