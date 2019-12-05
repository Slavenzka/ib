<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFilled;
use App\Models\Contact\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    /**
     * @param ContactFormRequest $request
     * @return string
     */
    public function send(ContactFormRequest $request): string
    {
        $contact = Contact::create($request->only('name', 'email', 'phone', 'message'));

        Mail::send(new ContactFilled($contact));

        return route('app.contact.thanks', ['page' => 'contact']);
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
