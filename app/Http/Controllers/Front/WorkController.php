<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Contracts\View\View;

class WorkController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('app.work.index', [
            'works' => Work::latest()->get()
        ]);
    }

    /**
     * @param Work $work
     * @return View
     */
    public function show(Work $work): View
    {
        return \view('app.work.show', compact('work'));
    }
}
