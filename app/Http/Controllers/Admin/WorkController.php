<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkSavingRequest;
use App\Jobs\ImageSaving;
use App\Models\Work\Work;
use App\Models\Work\WorkType;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function redirect;

class WorkController extends Controller
{
    protected $types;

    public function __construct()
    {
        $this->types = WorkType::all();
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.works.index', [
            'works' => Work::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.works.create', ['types' => $this->types]);
    }

    /**
     * @param WorkSavingRequest $request
     * @return RedirectResponse
     */
    public function store(WorkSavingRequest $request): RedirectResponse
    {
        /** @var Work $work */
        $work = Work::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'type_id' => $request->input('type_id'),
            'in_slideshow' => $request->has('in_slideshow'),
        ]);

        if ($request->hasFile('preview')) {
            dispatch(new ImageSaving($work, 'preview', createFileName($request->file('preview'))));
        }

        if ($request->hasFile('work')) {
            dispatch(new ImageSaving($work, 'work', createFileName($request->file('work'))));
        }

        return redirect()->route('admin.works.edit', $work);
    }

    /**
     * @param Work $work
     * @return View
     */
    public function edit(Work $work): View
    {
        return \view('admin.works.edit', [
            'work' => $work,
            'types' => $this->types,
        ]);
    }

    /**
     * @param WorkSavingRequest $request
     * @param Work $work
     * @return RedirectResponse
     */
    public function update(WorkSavingRequest $request, Work $work): RedirectResponse
    {
        $work->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'type_id' => $request->input('type_id'),
            'in_slideshow' => $request->has('in_slideshow'),
        ]);

        if ($request->hasFile('preview')) {
            $work->clearMediaCollection('preview');
            dispatch(new ImageSaving($work, 'preview', createFileName($request->file('preview'))));
        }

        if ($request->hasFile('work')) {
            $work->clearMediaCollection('work');
            dispatch(new ImageSaving($work, 'work', createFileName($request->file('work'))));
        }

        return redirect()->route('admin.works.edit', $work);
    }

    /**
     * @param Work $work
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Work $work): RedirectResponse
    {
        $work->delete();

        return back();
    }
}
