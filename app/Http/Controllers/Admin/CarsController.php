<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\Cars\CarCreationServiceContract;
use App\Contracts\Services\Cars\CarRemoverServiceContract;
use App\Contracts\Services\Cars\CarUpdateServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarsController extends Controller
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository
    ) {
    }

    public function index(): View
    {
        $this->authorize('viewAny', Car::class);

        $cars = $this->carsRepository->findAll();
        return view('pages.admin.cars.list', ['cars' => $cars]);
    }

    public function create(): View
    {
        $this->authorize('create', Car::class);

        return view('pages.admin.cars.create', ['car' => $this->carsRepository->getModel()]);
    }

    public function store(
        CarRequest $request,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        CarCreationServiceContract $carCreationService,
        TagsSynchronizerServiceContract $tagsSynchronizerService,
    ): RedirectResponse {
        $this->authorize('create', Car::class);

        $car = $carCreationService->create($request->validated(), $request->get('category_id'));

        $tagsSynchronizerService->sync($car, $tagsRequest->get('tags'));

        $flashMessage->success('Модель успешно создана');

        return redirect()->route('admin.cars.index');
    }

    public function edit(int $id): View
    {
        $car = $this->carsRepository->getById($id, ['image', 'images']);
        $this->authorize('update', $car);

        return view('pages.admin.cars.edit', ['car' => $car]);
    }

    public function update(
        CarRequest $request,
        TagsRequest $tagsRequest,
        int $id,
        FlashMessageContract $flashMessage,
        CarUpdateServiceContract $carUpdateService,
        TagsSynchronizerServiceContract $tagsSynchronizerService,
    ): RedirectResponse {
        $this->authorize('update', [Car::class, $id]);

        $car = $carUpdateService->update($id, $request->validated(), $request->get('category_id'));

        $tagsSynchronizerService->sync($car, $tagsRequest->get('tags'));

        $flashMessage->success('Модель успешно обновлена');

        return back();
    }

    public function destroy(
        int $id,
        CarRemoverServiceContract $carRemoverService,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        $this->authorize('delete', [Car::class, $id]);

        $carRemoverService->delete($id);

        $flashMessage->success('Модель удалена');

        return back();
    }
}
