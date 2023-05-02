<?php

namespace App\Http\Controllers;

use App\Contracts\Services\UserNotificationServiceContract;
use App\Contracts\Services\OrdersServiceContract;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\OrdersService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(
        Request $request,
        UserNotificationServiceContract $userNotificationService,
        OrdersServiceContract $userOrdersService
    ): Factory|View|Application {
        $notifications = $userNotificationService->findNotifications(Auth::user());
        $orders = $userOrdersService->findOrders(Auth::user());

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

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
