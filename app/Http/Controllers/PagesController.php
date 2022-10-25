<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Article;
use App\Models\Car;

class PagesController extends Controller
{
    public function homepage(): View
    {
        $homeNews = Article::whereNotNull('published_at')->latest('published_at')->take(3)->get();
        $cars = Car::where('is_new', true)->take(4)->get();

        return view('pages.homepage', [
            'homeNews' => $homeNews,
            'cars' => $cars,
        ]);
    }

    public function clients(): View
    {
        $cars = Car::get();
        dump(
            $cars->avg('price'),
            $cars->whereNotNull('old_price'),
            $cars->whereNotNull('old_price')->avg('price'),
            $cars->max('price'),
            $cars->pluck('salon'),
            $cars->pluck('engine.name'),

        );
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
