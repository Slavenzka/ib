<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::paginate(20)
        ]);
    }
}
