<?php

namespace App\Enums;

enum ModelStatus: string
{
    case NOT_AVAILABLE = 'not_available';
    case SOON = 'soon';
    case SALE = 'sale';
}
