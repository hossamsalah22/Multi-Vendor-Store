<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('website.auth.two-factor-auth', compact('user'));
    }
}
