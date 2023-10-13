<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return $users;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Ban the specified resource from storage.
     */
    public function ban(User $user)
    {
        $user->update(['banned' => $user->banned ? 0 : 1]);
        return response()->json(['message' => 'User has been Ban\Unbanned Successfully.']);
    }
}
