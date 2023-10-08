<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticateAdmin
{
    public function authenticate(Request $request)
    {
        $username = $request->post(config('fortify.username'));
        $password = $request->post('password');
        $admin = Admin::where('email', $username)
            ->orWhere('phone_number', $username)
            ->orWhere('username', $username)->first();
        if ($admin && Hash::check($password, $admin->password))
            return $admin;

        return false;
    }
}
