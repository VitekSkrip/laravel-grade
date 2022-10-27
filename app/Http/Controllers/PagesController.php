<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Article;
use App\Models\Car;
use Illuminate\Support\Str;

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

            $cars->whereNotNull('old_price')->avg('price'),

            $cars->where('price', $cars->max('price'))->toArray(),
        
            $cars->pluck('salon')->unique(),

            $cars->pluck('engine.name')->unique()->sort(),

            $cars->pluck('carClass.name')->unique()->keyBy(function ($item) { return $item; })->sort(),

            $models = $cars->filter(function ($item) {
                $sales = $item->old_price;
                $modelName = Str::contains($item->name, ['5', '6']);
                $engineName = Str::contains($item->engine['name'], ['5', '6']);
                $kppName = Str::contains($item->kpp, ['5', '6']);

                return $sales && ($engineName || $kppName || $modelName);
            })->values()->keyBy('id'),

            $bodyCollection = $cars->whereNull('old_price')->groupBy('carBody.name')->map(function ($item){
                return $item->avg('price');
            })->sort(),

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
