<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function create_token(Request $request, $user)
    {
        if ($user && Hash::check($request->password, $user->password)) {
            $device_name = $request->device_name ?? $request->userAgent();
            $token = $user->createToken($device_name)->plainTextToken;

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Login failed',
            ], 401);
        }
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'device_name' => 'string',
        ]);

        $user = User::where('email', $request->email)->first();
        return $this->create_token($request, $user);
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'device_name' => 'string',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        return $this->create_token($request, $admin);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Logout success',
        ]);
    }
}
