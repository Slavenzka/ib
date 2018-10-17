<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @param ContactFormRequest $request
     * @return RedirectResponse
     */
    public function send(ContactFormRequest $request): RedirectResponse
    {
        Contact::create($request->only('name', 'email', 'phone'));

        return \redirect()->route('app.contact.thanks', ['page' => 'contact']);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function thanks(Request $request): View
    {
        return \view('app.contact.thanks', [
            'content' => trans('page.thanks.message.' . $request->get('page', 'default')),
        ]);
    }
}
