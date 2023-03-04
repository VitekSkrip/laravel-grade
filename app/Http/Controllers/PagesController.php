<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\BannersRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Services\CalculateStatisticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    public function __construct(
        private ArticlesRepositoryContract $articlesRepository,
        private CarsRepositoryContract $carsRepositoryContract,
        private BannersRepositoryContract $bannersRepository
    ) {
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

    public function profile(): View
    {
        return view('pages.profile');
    }

    public function reports(): View
    {
        return view('pages.reports');
    }

//    public function generateStat(Request $request)
//    {
//        \App\Jobs\GenerateReport::dispatchNow($request->input('selected_fields'), $request->user());
//        return back();
//    }
}
