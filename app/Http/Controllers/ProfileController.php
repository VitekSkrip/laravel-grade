<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\UserNotificationServiceContract;
use App\Contracts\Services\OrdersServiceContract;
use App\Http\Requests\Profile\ProfileDeleteRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(
        Request $request,
        UserNotificationServiceContract $userNotificationService,
        OrdersRepositoryContract $userOrdersRepository
    ): View {
        $notifications = $userNotificationService->findNotifications(Auth::user());
        $orders = $userOrdersRepository->find(Auth::user());

        return view('pages.profile.edit', [
            'user' => $request->user(),
            'notifications' => $notifications,
            'orders' => $orders,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(ProfileDeleteRequest $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
