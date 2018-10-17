<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact\Brief;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BriefController extends Controller
{
    public function index()
    {
        return \view('admin.brief.index', [
            'briefs' => Brief::latest()->paginate(20),
        ]);
    }
}
