<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return \view('admin.contacts.index', [
            'contacts' => Contact::latest()->paginate(50)
        ]);
    }

    public function show(Contact $contact)
    {
        return \view('admin.contacts.show', compact('contact'));
    }
}
