<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\BriefFormRequest;
use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendNotifications;
use App\Models\Brief;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\BriefFilled;
use App\Notifications\ContactFormFilled;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mail;

class ContactsController extends Controller
{
    /**
     * @param ContactFormRequest $request
     * @return string
     */
    public function send(ContactFormRequest $request): string
    {
        if ($request->filled('full_name')) {
            return route('app.contacts.thanks', ['page' => 'contact']);
        }

        /** @var Contact $contact */
        $contact = Contact::create($request->only('name', 'email', 'phone', 'message'));

        dispatch(new SendNotifications(ContactFormFilled::class, $contact));

        return route('app.contacts.thanks', ['page' => 'contact']);
    }

    /**
     * @param BriefFormRequest $request
     * @return RedirectResponse
     */
    public function brief(BriefFormRequest $request): RedirectResponse
    {
        $brief = Brief::create([
            'body' => $request->only(
                'contact', 'company', 'target', 'group', 'functional', 'design', 'hosting'
            ),
        ]);

        dispatch(new SendNotifications(BriefFilled::class, $brief));

        return redirect()->route('app.contacts.thanks', ['page' => 'brief']);
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
