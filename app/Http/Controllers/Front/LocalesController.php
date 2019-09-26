<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalesController extends Controller
{
    /**
     * @param $lang
     * @return RedirectResponse
     */
    public function switch($lang): RedirectResponse
    {
        if (!in_array($lang, config('app.locales'))) {
            return \back();
        }

        session()->put('locale', $lang);

        return \back();
    }
}
