<?php

namespace App\Contracts\Repositories;

use App\Models\User;
use Illuminate\Notifications\DatabaseNotificationCollection;

interface NotificationsRepositoryContract
{
    public function findNotifications(User $user): DatabaseNotificationCollection;

    public function markAsRead(DatabaseNotificationCollection $databaseNotificationCollection): void;
}
