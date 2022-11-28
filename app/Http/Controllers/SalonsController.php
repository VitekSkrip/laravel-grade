<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\SalonsRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SalonsController extends Controller
{
    public function __construct(private SalonsRepositoryContract $salonsRepository)
    {
        
    }

    public function index()
    {
        $salons = collect([]);
        return view('pages.salons', ['salons' => $this->salonsRepository->find()]);
    }
}
