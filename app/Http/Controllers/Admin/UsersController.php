<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return \view('admin.users.index', [
            'users' => User::latest()->get(),
        ]);
    }
}
