<?php

namespace App\Services;

class PriceFormatter
{
    public function format(int $value): string
    {
        return number_format(num: $value, thousands_separator:  ' ');
    }
}
