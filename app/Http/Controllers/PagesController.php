<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Article;

class PagesController extends Controller
{
    public function homepage(): View
    {
        $homeNews = Article::whereNotNull('published_at')->latest('published_at')->take(3)->get();
        return view('pages.homepage', ['homeNews' => $homeNews]);
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
