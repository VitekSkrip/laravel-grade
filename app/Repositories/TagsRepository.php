<?php

namespace App\Repositories;

use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Tag;
use Illuminate\Support\Collection;
use App\Contracts\Services\HasTagsContract;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class TagsRepository implements TagsRepositoryContract
{
    use FlushesCache;

    public function __construct(private Tag $model)
    {
        
    }

    protected function cacheTags(): array
    {
        return ['tags'];
    }

    private function getModel(): Tag
    {
        return $this->model;
    }

    public function getFirstOrCreate(string $name): Tag
    {
        return Cache::tags(['tags'])->remember("tagByName|$name", Carbon::now()->addHours(1), fn () =>
            $this->getModel()->firstOrCreate(['name' => $name])
        );
    }

    public function syncTags(HasTagsContract $model, array $tags)
    {
        $model->tags()->sync($tags);
    }

    public function deleteUnusedTags()
    {
        $this->getModel()->whereDoesntHave('articles')->delete();
        $this->flushCache();
    }

    public function getMostPopularTag(): Collection
    {
        return $this->getModel()->select(['name'])->withCount('articles')->orderByDesc('articles_count')->limit(1)->get();
    }

    public function getAvgArticlesTag(): float
    {
        return $this->getModel()->withCount('articles')->has('articles')->pluck('articles_count')->avg();
    }
}
