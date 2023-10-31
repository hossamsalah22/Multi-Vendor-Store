<?php

namespace App\Http\Controllers;

class ChangeLanguageController
{
    public function __invoke($locale)
    {
        session()->put('locale', $locale);
        auth('admin')->user()?->update(['language' => $locale]);
        return redirect()->back();
    }
}
