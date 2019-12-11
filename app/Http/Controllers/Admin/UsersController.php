<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSavingRequest;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @return View
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * @param UserSavingRequest $request
     * @return RedirectResponse
     */
    public function store(UserSavingRequest $request): RedirectResponse
    {
        $attributes = $request->only('name', 'email', 'role', 'telegram_user_id');
        $attributes['password'] = Hash::make($request->input('password'));

        User::create($attributes);

        return redirect(route('admin.users.index'));
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
     * @param UserSavingRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserSavingRequest $request, User $user): RedirectResponse
    {
        $attributes = $request->only('name', 'role', 'telegram_user_id');

        if ($request->filled('password')) {
            $attributes['password'] = Hash::make($request->input('password'));
        }

        $user->update($attributes);

        return back();
    }

    /**
     * @param User $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect(route('admin.users.index'));
    }
}
