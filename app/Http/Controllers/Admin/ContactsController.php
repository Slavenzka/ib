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
			'contacts' => Contact::latest()->paginate(50),
		]);
	}

	public function edit(Contact $contact)
	{
		return \view('admin.contacts.edit', compact('contact'));
	}

	public function update(Request $request, Contact $contact)
	{
		$contact->update($request->only('name', 'phone', 'email', 'comment', 'status'));
		return \back();
	}
}
