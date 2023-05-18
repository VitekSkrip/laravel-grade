<?php

namespace App\Enums;

enum OrderPaymentStatus: string
{
    case NOT_PAID = 'Не оплачено';

    case PAYMENT_ERROR = 'Ошибка оплаты';

    case PAID = 'Оплачено';
}
