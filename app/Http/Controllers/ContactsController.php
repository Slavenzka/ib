<?php

namespace App\Http\Controllers;

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
}
