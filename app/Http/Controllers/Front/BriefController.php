<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\BriefFormRequest;
use App\Models\Contact\Brief;
use Illuminate\Http\RedirectResponse;

class BriefController extends Controller
{
    /**
     * @param BriefFormRequest $request
     * @return RedirectResponse
     */
    public function store(BriefFormRequest $request): RedirectResponse
    {
        Brief::create([
            'body' => $request->only('contact', 'company', 'target', 'group', 'functional', 'design',
                'hosting'),
        ]);

        return \redirect()->route('app.contact.thanks', ['page' => 'brief']);
    }
}
