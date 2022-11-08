<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\BannersRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;

class PagesController extends Controller
{
    public function __construct(private ArticlesRepositoryContract $articlesRepository, private CarsRepositoryContract $carsRepositoryContract, private BannersRepositoryContract $bannersRepository)
    {
        
    }

    public function homepage(): View
    {
        $homeNews = $this->articlesRepository->findForHomePage(3);

        $cars = $this->carsRepositoryContract->findForHomePage(4);

        $banners = $this->bannersRepository->getBanners(3);

        return view('pages.homepage', [
            'homeNews' => $homeNews,
            'cars' => $cars,
            'banners' => $banners,
        ]);
    }

    public function clients(): View
    {
        $cars = $this->carsRepositoryContract->findAll();

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
