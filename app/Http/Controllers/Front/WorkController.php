<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Work\Work;

class WorkController extends Controller
{
    public function index()
    {
        return \view('app.work.index', [
            'works' => Work::latest()->get()
        ]);
    }
    /**
     * @param Work $work
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Work $work)
    {
        return \view('app.work.show', compact('work'));
    }
}
