<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use function back;

class LocalesController extends Controller
{
    /**
     * @param $lang
     * @return RedirectResponse
     */
    public function switch($lang): RedirectResponse
    {
        if (!in_array($lang, config('app.locales'))) {
            return back();
        }

        session()->put('locale', $lang);

        return back();
    }
}
