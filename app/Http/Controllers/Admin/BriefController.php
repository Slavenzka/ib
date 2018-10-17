<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact\Brief;

class BriefController extends Controller
{
    public function index()
    {
        return \view('admin.brief.index', [
            'briefs' => Brief::latest()->paginate(20),
        ]);
    }

    public function show(Brief $brief)
    {
        $brief->body = collect($brief->body)->sortBy(function ($i, $k) {
            return array_search($k, array_keys(Brief::$GROUPS));
        })->filter(function ($i) {
            return count(array_filter(array_values($i)));
        });

        return \view('admin.brief.show', compact('brief'));
    }
}
