<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;

class PagesController extends Controller
{
    public function __construct(
        public readonly ArticlesRepositoryContract $articlesRepository,
        public readonly CarsRepositoryContract $carsRepositoryContract,
    ) {
    }

    public function homepage(): View
    {
        $homeNews = $this->articlesRepository->findForHomePage(2);

        $cars = $this->carsRepositoryContract->findForMainPage(4);

        return view('pages.homepage', [
            'homeNews' => $homeNews,
            'cars' => $cars,
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }
}
