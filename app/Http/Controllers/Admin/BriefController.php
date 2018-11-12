<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact\Brief;
use Illuminate\Http\Request;

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

    public function update(Request $request, Brief $brief)
    {
        $body = [
            $request->contact,
            $request->company,
            $request->target,
            $request->group,
            $request->functional,
            $request->design,
            $request->hosting,
        ];

        $status = $request->status;

        $brief->update(compact('body', 'status'));

        return \back();
    }
}
