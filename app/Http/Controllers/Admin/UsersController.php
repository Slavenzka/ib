<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(25),
        ]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $attributes = $request->only('name', 'telegram_user_id');
        $attributes['password'] = \Hash::make($request->input('password'));

        $user->update($attributes);

        return back();
    }

    /**
     * @param User $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect(route('admin.users.index'));
    }
}
