<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class Mainpage extends Controller
{
    public function index(): View
    {
        $locale = \App::getLocale();

        return view('mainpage', ['locale' => $locale]);
    }
}
