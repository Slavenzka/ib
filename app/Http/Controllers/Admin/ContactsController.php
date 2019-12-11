<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function back;
use function view;

class ContactsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.contacts.index', [
            'contacts' => Contact::latest()->paginate(50),
        ]);
    }

    /**
     * @param Contact $contact
     * @return View
     */
    public function edit(Contact $contact): View
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * @param Request $request
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->all());

        return back()->with('success', 'Контакт обновлен.');
    }

    /**
     * @param Contact $contact
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return back()->with('success', 'Контакт удален.');
    }
}
