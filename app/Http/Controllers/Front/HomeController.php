<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Work\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('app.home.index', [
            'works' => Work::latest()->where('in_slideshow', true)->take(5)->get(),
        ]);
    }

    /**
     * @param $lang
     * @return RedirectResponse
     */
    public function locale($lang): RedirectResponse
    {
        if (!in_array($lang, App::$LANGS)) {
            return \back();
        }

        session()->put('locale', $lang);
        return \back();
    }

    /**
     * @return View
     */
    public function about(): View
    {
        return \view('app.about.index');
    }
}
