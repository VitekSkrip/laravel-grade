<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\TestDrivesRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\TestDrives\TestDrivesCreationServiceContract;
use App\Contracts\Services\TestDrives\TestDrivesRemoverServiceContract;
use App\Contracts\Services\TestDrives\TestDrivesUpdateServiceContract;
use App\Http\Requests\ClientRequests\TestDriveRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestDriveController extends Controller
{
    public function show(
        CarsRepositoryContract $carsRepository,
        TestDrivesRepositoryContract $testDrivesRepository
    ): View {
        return view('pages.test-drive', [
            'cars' => $carsRepository->findAvailableAtSalons(['salons', 'image']),
            'testDrive' => $testDrivesRepository->getModel()
        ]);
    }

    public function store(
        TestDriveRequest $request,
        TestDrivesCreationServiceContract $testDrivesService,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        $testDrivesService->create($request->validated());
        $flashMessage->success('Ваша заявка сформирована. В ближайшее время мы с Вами свяжемся');
        return back();
    }

    public function update(
        TestDriveRequest $request,
        TestDrivesUpdateServiceContract $testDrivesService,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        $fields = $request->validated();
        $testDrivesService->update($fields['id'], [
            'salon_id' => $fields['salon_id'],
            'car_id' => $fields['car_id'],
            'client_name' => $fields['client_name'],
            'client_phone' => $fields['client_phone'],
            'more_info' => $fields['more_info'] ?? '',
            'status' => $fields['status'] ?? ''
        ]);

        $flashMessage->success('Заявка успешно обновлена');
        return back();
    }

    public function edit(
        Request $request,
        TestDrivesRepositoryContract $testDrivesRepository
    ): View {
        return view('pages.manager.test-drives.element-edit', ['testDrive' => $testDrivesRepository->findById($request->id, ['car.salons', 'salon'])]);
    }

    public function destroy(
        Request $request,
        FlashMessageContract $flashMessage,
        TestDrivesRemoverServiceContract $testDrivesService
    ): RedirectResponse {
        $testDrivesService->delete($request->id);
        $flashMessage->success('Заявка удалена');
        return back();
    }
}
