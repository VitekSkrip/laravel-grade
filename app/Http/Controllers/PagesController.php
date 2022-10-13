<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PagesController extends Controller
{
    public function homepage(): View
    {
        return view('pages.homepage');
    }

    public function clients(): View
    {
        return view('pages.clients');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function contacts(): View
    {
        return view('pages.contacts');
    }

    public function finances(): View
    {
        return view('pages.finances');
    }

    public function sales(): View
    {
        return view('pages.sales');
    }

}
