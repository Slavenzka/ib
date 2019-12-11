<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brief;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BriefController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.briefs.index', [
            'briefs' => Brief::latest()->paginate(20),
        ]);
    }

    /**
     * @param Brief $brief
     * @return View
     */
    public function edit(Brief $brief): View
    {
        $brief->body = collect($brief->body)->sortBy(function ($i, $k) {
            return array_search($k, array_keys(Brief::$GROUPS));
        })->filter(function ($i) {
            return count(array_filter(array_values($i)));
        });

        return view('admin.briefs.edit', compact('brief'));
    }

    /**
     * @param Request $request
     * @param Brief $brief
     * @return RedirectResponse
     */
    public function update(Request $request, Brief $brief): RedirectResponse
    {
        $brief->update([
            'body' => $request->only('contact', 'company', 'target', 'group', 'functional', 'design',
                'hosting'),
            'status' => $request->status
        ]);

        return back()->with('success', 'Бриф обновлен.');
    }

    /**
     * @param Brief $brief
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Brief $brief): RedirectResponse
    {
        $brief->delete();

        return back()->with('success', 'Бриф удален.');
    }
}
