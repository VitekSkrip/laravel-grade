<?php

namespace App\Enums;

enum CallbackStatus: string
{
    case CHECKED = 'Обработана';
    case NOT_CHECKED = 'Не обработана';
}
