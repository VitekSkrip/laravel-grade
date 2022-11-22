<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Foundation\Events\Dispatchable; #отвечает за возможность вызвать это событие

class ArticleCreatedEvent
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
