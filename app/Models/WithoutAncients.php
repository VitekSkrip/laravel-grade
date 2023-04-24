<?php

namespace App\Models;

use App\Models\Scopes\AncientScope;

trait WithoutAncients
{
    public static function bootWithoutAncients(): void
    {
        static::addGlobalScope(new AncientScope());
    }
}
