<?php

namespace App\Enums;

enum OrderPaymentStatus: string
{
    case NOT_CHECKED = 'Не обработана';
    case CHECKED = 'Обработана';
}
