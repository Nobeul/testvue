<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('pages.contact');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();
        // return redirect()->route('contact.list');
    }

    public function contactList(){
        return view('pages.contactList');
    }

    public function getContacts(){
        return Contact::orderBy('id', 'desc')->get();
    }

    public function updateContactPage(Request $request){
        return view('pages.updateContact');
    }

    public function getContactAccordingToId(Request $request){
        return Contact::find($request->id);
    }

    public function updateContact(Request $request){
        $contact = Contact::find($request->id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();
    }

    public function deleteContact(Request $request){
        $contact = Contact::find($request->id);
        $contact->delete();
    }
}
