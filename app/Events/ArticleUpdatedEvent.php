<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Foundation\Events\Dispatchable;

class ArticleUpdatedEvent
{
    use Dispatchable;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public readonly Article $article)
    {
        //
    }
}
