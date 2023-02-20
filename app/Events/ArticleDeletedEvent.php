<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Foundation\Events\Dispatchable;

class ArticleDeletedEvent
{
    use Dispatchable;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public readonly string $slug)
    {
        //
    }
}
