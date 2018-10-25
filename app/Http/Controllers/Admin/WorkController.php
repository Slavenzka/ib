<?php

namespace App\Http\Controllers\Admin;

use App\Models\App;
use App\Models\Work\Work;
use App\Models\Work\WorkType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        return \view('admin.work.index', [
            'works' => Work::paginate(20),
        ]);
    }

    public function create(): View
    {
        return \view('admin.work.create', [
            'types' => WorkType::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $work = Work::create([
            'type_id' => $request->get('type_id'),
            'slug' => $request->get('title')['en'],
        ]);

        foreach (App::$LANGS as $lang) {
            $work->translate()->create([
                'lang' => $lang,
                'title' => $request->get('title')[$lang],
                'description' => $request->get('description')[$lang],
                'body' => $request->get('body')[$lang],
            ]);
        }

        if ($request->hasFile('preview')) {
            $work->addMediaFromRequest('preview')
                 ->toMediaCollection('preview');
        }

        if ($request->hasFile('work')) {
            $work->addMediaFromRequest('work')
                 ->toMediaCollection('work');
        }

        return \redirect()->route('admin.work.edit', $work);
    }

    public function edit(Work $work): View
    {
        return \view('admin.work.edit', [
            'work' => $work,
            'types' => WorkType::latest()->get(),
        ]);
    }

    public function update(Request $request, Work $work): RedirectResponse
    {
        $work->update([
            'type_id' => $request->get('type_id'),
            'slug' => $request->get('title')['en'],
        ]);

        foreach (App::$LANGS as $lang) {
            $work->translate($lang)->update([
                'lang' => $lang,
                'title' => $request->get('title')[$lang],
                'description' => $request->get('description')[$lang],
                'body' => $request->get('body')[$lang],
            ]);
        }

        if ($request->hasFile('preview')) {
            $work->clearMediaCollection('preview');
            $work->addMediaFromRequest('preview')
                 ->toMediaCollection('preview');
        }

        if ($request->hasFile('work')) {
            $work->clearMediaCollection('work');
            $work->addMediaFromRequest('work')
                 ->toMediaCollection('work');
        }

        return \redirect()->route('admin.work.edit', $work);
    }
}
