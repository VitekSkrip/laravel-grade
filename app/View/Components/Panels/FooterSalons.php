<?php

namespace App\View\Components\Panels;

use App\Contracts\Repositories\SalonsRepositoryContract;
use Illuminate\Http\Client\RequestException;
use Illuminate\View\Component;

class FooterSalons extends Component
{
    public function __construct(private SalonsRepositoryContract $salonsRepository)
    {

    }

    public function render()
    {
        try {
            $salons = $this->salonsRepository->findSomeRandoms(2, true);
        } catch (RequestException) {
            abort(404);
        }

        return view('components.panels.footer-salons', ['salons' => $salons]);
    }
}
