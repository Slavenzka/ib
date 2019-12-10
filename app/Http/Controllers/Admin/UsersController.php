<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSavingRequest;
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
        User::create($this->handleAttributes($request));

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
        $user->update($this->handleAttributes($request));

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

    /**
     * @param UserSavingRequest $request
     * @return array
     */
    private function handleAttributes(UserSavingRequest $request): array
    {
        $attributes = $request->only('name', 'telegram_user_id');
        $attributes['password'] = \Hash::make($request->input('password'));

        return $attributes;
    }
}
