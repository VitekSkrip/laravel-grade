<?php

namespace App\Services;

use App\Contracts\Repositories\NotificationsRepositoryContract;
use App\Contracts\Services\UserNotificationServiceContract;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotificationCollection;

class UserNotificationService implements UserNotificationServiceContract
{

    public function __construct(private readonly NotificationsRepositoryContract $notificationsRepository)
    {
    }

    public function findNotifications(User $user): DatabaseNotificationCollection
    {
        $notifications = $this->notificationsRepository->findNotifications($user);

        $markForUnread = $notifications->filter->unread();

        if ($markForUnread->isNotEmpty()) {
            $this->notificationsRepository->markAsRead($markForUnread->transform(fn ($item) => clone $item));
        }

        return $notifications;
    }
}
