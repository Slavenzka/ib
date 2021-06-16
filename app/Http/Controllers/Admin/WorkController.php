<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\Http\Requests\WorkSavingRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use App\Models\{Work, WorkType};
use Exception;
use Illuminate\Http\RedirectResponse;

class WorkController extends Controller
{
    /**
     * @var WorkType[]|Collection
     */
    protected $types;

    /**
     * WorkController constructor.
     */
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
            $this->storeFile($work, $request->file('preview'), 'preview');
        }

        if ($request->hasFile('work')) {
            $this->storeFile($work, $request->file('work'), 'work');
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
        dd($request->all());
        $work->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'type_id' => $request->input('type_id'),
            'in_slideshow' => $request->has('in_slideshow'),
        ]);

        if ($request->hasFile('preview')) {
            $this->storeFile($work, $request->file('preview'), 'preview');
        }

        if ($request->hasFile('work')) {
            $this->storeFile($work, $request->file('work'), 'work');
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

    private function storeFile(Work $work, UploadedFile $file, string $collection)
    {
        $work->clearMediaCollection($collection);

        $work->addMediaFromRequest($collection)
            ->usingFileName(Helper::createFileName($file))
            ->toMediaCollection($collection);
    }
}
