<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\MainController;
use App\Models\User;

class UsersController extends MainController
{

    public function __construct()
    {
        parent::__construct('users');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Ban the specified resource from storage.
     */
    public function ban(User $user)
    {
        $user->update(['banned' => $user->banned ? 0 : 1]);
        return back()->with('success', __('messages.updated_successfully'));
    }
}
