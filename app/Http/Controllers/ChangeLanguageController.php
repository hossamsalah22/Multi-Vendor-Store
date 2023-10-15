<?php

namespace App\Http\Controllers;

class ChangeLanguageController
{
    public function __invoke($locale)
    {
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
