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
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.work.index', [
            'works' => Work::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.work.create', [
            'types' => WorkType::latest()->get(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $work = Work::create([
            'type_id' => $request->get('type_id'),
            'slug' => $request->get('title')['en'],
            'in_slideshow' => $request->get('in_slideshow'),
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
                 ->setFileName(sha1($request->file('preview')->getClientOriginalName() . time()))
                 ->toMediaCollection('preview');
        }

        if ($request->hasFile('work')) {
            $work->addMediaFromRequest('work')
                 ->setFileName(sha1($request->file('preview')->getClientOriginalName() . time()))
                 ->toMediaCollection('work');
        }

        return \redirect()->route('admin.work.edit', $work);
    }

    /**
     * @param Work $work
     * @return View
     */
    public function edit(Work $work): View
    {
        return \view('admin.work.edit', [
            'work' => $work,
            'types' => WorkType::latest()->get(),
        ]);
    }

    /**
     * @param Request $request
     * @param Work $work
     * @return RedirectResponse
     */
    public function update(Request $request, Work $work): RedirectResponse
    {
        $work->update([
            'type_id' => $request->get('type_id'),
            'slug' => $request->get('title')['en'],
            'in_slideshow' => $request->get('in_slideshow'),
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
                 ->setFileName(sha1($request->file('preview')->getClientOriginalName() . time()))
                 ->toMediaCollection('preview');
        }

        if ($request->hasFile('work')) {
            $work->clearMediaCollection('work');
            $work->addMediaFromRequest('work')
                 ->setFileName(sha1($request->file('preview')->getClientOriginalName() . time()))
                 ->toMediaCollection('work');
        }

        return \redirect()->route('admin.work.edit', $work);
    }
}
