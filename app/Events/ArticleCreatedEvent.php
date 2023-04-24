<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ArticleCreatedEvent extends AbstractArticleActionEvent
{
    use Dispatchable;
}
