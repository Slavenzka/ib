<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\BriefFormRequest;
use App\Mail\BriefFilled;
use App\Models\Contact\Brief;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class BriefController extends Controller
{
    /**
     * @param BriefFormRequest $request
     * @return RedirectResponse
     */
    public function store(BriefFormRequest $request): RedirectResponse
    {
        $brief = Brief::create([
            'body' => $request->only('contact', 'company', 'target', 'group', 'functional', 'design',
                'hosting'),
        ]);

        Mail::send(new BriefFilled($brief));

        return \redirect()->route('app.contact.thanks', ['page' => 'brief']);
    }
}
