<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Work\Work;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('app.home.index', [
            'works' => Work::inSlideshow()->take(5)->get(),
        ]);
    }

    /**
     * @return View
     */
    public function about(): View
    {
        return \view('app.about.index');
    }
}
