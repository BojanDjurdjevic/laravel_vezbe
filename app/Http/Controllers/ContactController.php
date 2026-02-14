<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
    public function index()
    {
        return view('contact');
    }

    public function adminContacts() 
    {
        $contacts = ContactModel::all();

        return view('allContacts', compact('contacts'));
    }

    public function sendContact(SendContactRequest $request)
    {
        $this->contactRepo->createNew($request->all());

        return redirect('/shop');
    }

    public function delete($contact)
    {
        $oneContact = $this->contactRepo->getContactById($contact);

        if($oneContact === null) die("Ovaj kontakt ne postoji");

        $oneContact->delete();

        return redirect()->back();
    }
}
