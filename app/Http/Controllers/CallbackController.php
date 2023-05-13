<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CallbacksRepositoryContract;
use App\Contracts\Services\Callbacks\CallbacksCreationServiceContract;
use App\Contracts\Services\Callbacks\CallbacksUpdateServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Http\Requests\ClientRequests\ClientRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CallbackController extends Controller
{
    public function store(
        ClientRequest        $request,
        FlashMessageContract $flashMessage,
        CallbacksCreationServiceContract $callbacksService
    ) {
        $callbacksService->create($request->validated());
        $flashMessage->success('Заявка успешно отправлена. С Вами скоро свяжутся!');

        return redirect()->route('callback.show');
    }

    public function update(
        Request $request,
        CallbacksUpdateServiceContract $callbacksService
    ) {
        $callbacksService->update($request->id, ['status' => $request->status]);

        return back();
    }

    public function show(): View
    {
        return view('pages.callback');
    }
}
