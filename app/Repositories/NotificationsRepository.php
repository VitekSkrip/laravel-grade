<?php

namespace App\Repositories;

use App\Contracts\Repositories\NotificationsRepositoryContract;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotificationCollection;

class NotificationsRepository implements NotificationsRepositoryContract
{
    public function findNotifications(User $user): DatabaseNotificationCollection
    {
        return $user->notifications;
    }

    public function markAsRead(DatabaseNotificationCollection $databaseNotificationCollection): void
    {
        $databaseNotificationCollection->markAsRead();
    }
}
