<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StageSavingRequest;
use App\Models\Project;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StagesController extends Controller
{
    /**
     * @param Project $project
     * @param Stage $stage
     * @return View
     */
    public function show(Project $project, Stage $stage): View
    {
        return view('admin.stages.show', compact('project', 'stage'));
    }

    /**
     * @param Project $project
     * @return View
     */
    public function create(Project $project): View
    {
        return view('admin.stages.create', compact('project'));
    }

    /**
     * @param StageSavingRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function store(StageSavingRequest $request, Project $project): RedirectResponse
    {
        $attributes = $request->all();
        $attributes['starts_at'] = $request->input('starts_at') ? Carbon::parse($request->input('starts_at')) : null;
        $attributes['ends_at'] = $request->input('ends_at') ? Carbon::parse($request->input('starts_at')) : null;

        $stage = $project->stages()->create($attributes);

        $tags = $request->input('tags') ? explode(',', $request->input('tags')) : [];
        $project->tags()->sync($tags);
        $stage->tags()->attach($tags);

        return redirect(route('admin.crm.stages.show', [$project, $stage]));
    }

    /**
     * @param Project $project
     * @param Stage $stage
     * @return View
     */
    public function edit(Project $project, Stage $stage): View
    {
        return view('admin.stages.edit', compact('project', 'stage'));
    }

    public function update(StageSavingRequest $request, Project $project, Stage $stage): RedirectResponse
    {
        $attributes = $request->all();
        $attributes['starts_at'] = $request->input('starts_at') ? Carbon::parse($request->input('starts_at')) : null;
        $attributes['ends_at'] = $request->input('ends_at') ? Carbon::parse($request->input('starts_at')) : null;

        $stage->update($attributes);

        $tags = $request->input('tags') ? explode(',', $request->input('tags')) : [];
        $project->tags()->sync($tags);
        $stage->tags()->sync($tags);

        return redirect(route('admin.crm.stages.show', [$project, $stage]));
    }
}
