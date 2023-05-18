<?php

namespace App\View\Components\Forms\ConcreteFormsFields;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\SalonsRepositoryContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ManagerTestdriveFormFields extends Component
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
    ) {
    }

    public function render(): View|string|Closure
    {
        $cars = $this->carsRepository->findAvailableAtSalons(['salons', 'image']);

        return view('components.forms.concrete-forms-fields.manager-testdrive-form-fields', [
            'cars' => $cars,
        ]);
    }
}
