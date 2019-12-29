<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectSavingRequest;
use App\Http\Resources\TagResource;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;

class ProjectsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::withCount('comments')->paginate(20)
        ]);
    }

    /**
     * @param Project $project
     * @return View
     */
    public function show(Project $project): View
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.projects.create');
    }

    /**
     * @param ProjectSavingRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(ProjectSavingRequest $request): RedirectResponse
    {
        $project = Project::create($request->all());

        $tags = $request->input('tags') ? explode(',', $request->input('tags')) : [];
        $project->tags()->attach($tags);

        return redirect(route('admin.crm.projects.show', $project->id))->with('success', 'Проект «' . $project->title . '» создан.');
    }

    /**
     * @param Project $project
     * @return View
     */
    public function edit(Project $project): View
    {
        $tags = json_encode(TagResource::collection($project->tags));

        return view('admin.projects.edit', compact('project', 'tags'));
    }

    /**
     * @param ProjectSavingRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(ProjectSavingRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->only('title', 'description', 'status'));

        $tags = $request->input('tags') ? explode(',', $request->input('tags')) : [];
        $project->tags()->sync($tags);

        return back()->with('success', 'Проект успешно обновлен.');
    }
}
