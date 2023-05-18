<?php

namespace App\Contracts\Services;

use App\Models\User;
use Illuminate\Notifications\DatabaseNotificationCollection;

interface UserNotificationServiceContract
{
    public function findNotifications(User $user): DatabaseNotificationCollection;
}
