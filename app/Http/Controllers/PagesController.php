<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PagesController extends Controller
{
    public function homepage(): View
    {
        return view('pages.homepage');
    }
}
