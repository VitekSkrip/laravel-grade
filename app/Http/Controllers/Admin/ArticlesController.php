<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Articles\ArticleCreationServiceContract;
use App\Contracts\Services\Articles\ArticleRemoverServiceContract;
use App\Contracts\Services\Articles\ArticleUpdateServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\ArticlesRepositoryContract;
use Illuminate\View\View;

class ArticlesController extends Controller
{
    public function __construct(
        private ArticlesRepositoryContract $articlesRepository
    ) {
    }

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Article::class);

        $articles = $this->articlesRepository->findAll();

        return view('pages.admin.articles.list', compact('articles'));
    }

    public function create(): View
    {
        $this->authorize('create', Article::class);

        $article = $this->articlesRepository->getModel();
        return view('pages.admin.articles.create', compact('article'));
    }

    public function store(
        ArticleRequest $request,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        ArticleCreationServiceContract $createArticleService
    ): RedirectResponse {
        $this->authorize('create', Article::class);

        $createArticleService->create($request->validated(), $tagsRequest->get('tags'));

        $flashMessage->success('Новость успешно создана');

        return redirect()->route('admin.articles.index');
    }

    public function edit(string $slug): View
    {
        $article = $this->articlesRepository->findBySlug($slug);

        $this->authorize('update', $article);

        return view('pages.admin.articles.edit', compact('article'));
    }

    public function update(
        ArticleRequest $request,
        string $slug,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        ArticleUpdateServiceContract $updateArticleService
    ): RedirectResponse {
        $this->authorize('update', $this->articlesRepository->findBySlug($slug));

        $updateArticleService->update($slug, $request->validated(), $tagsRequest->get('tags'));

        $flashMessage->success('Новость успешно обновлена');

        return back();
    }

    public function destroy(
        string $slug,
        FlashMessageContract $flashMessage,
        ArticleRemoverServiceContract $articleRemoverService
    ): RedirectResponse {
        $this->authorize('update', $this->articlesRepository->findBySlug($slug));

        $articleRemoverService->delete($slug);

        $flashMessage->success('Новость удалена');

        return back();
    }
}
