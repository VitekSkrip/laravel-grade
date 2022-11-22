<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\CreateArticleServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;

class ArticlesController extends Controller
{
    public function __construct(private ArticlesRepositoryContract $articlesRepository)
    {

    }

    public function index(Request $request)
    {
        $allArticles = $this->articlesRepository->paginateForArticlesList(5, ['*'], 'page', $request->get('page', 1));

        return view('pages.articles', compact('allArticles'));
    }

    public function create()
    {
        $this->authorize('create', Article::class);

        $article = $this->articlesRepository->getModel();
        return view('pages.create', compact('article'));
    }

    public function store(
        ArticleRequest $request,
        TagsRequest $tagsRequest, CreateArticleServiceContract $createArticleService)
    {
        $this->authorize('create', Article::class);

        $createArticleService->create($request->validated(), $tagsRequest->get('tags'));

        return back()->with('success_message', 'Новость успешно создана');
    }

    public function show(string $slug)
    {
        $article = $this->articlesRepository->findBySlug($slug);
        return view('pages.article', compact('article'));
    }

    public function edit(string $slug)
    {
        $article = $this->articlesRepository->findBySlug($slug);

        $this->authorize('update', $article);

        return view('pages.edit', compact('article'));
    }

    public function update(
        ArticleRequest $request,
        string $slug,
        TagsRequest $tagsRequest,
        UpdateArticleServiceContract $updateArticleService)
    {
        $this->authorize('update', $this->articlesRepository->findBySlug($slug));

        $article =  $updateArticleService->update($slug, $request->validated(), $tagsRequest->get('tags'));
        
        return redirect(route('articles.edit', ['article' => $article]))->with('success_message', 'Новость успешно обновлена');
    }

    public function destroy(string $slug)
    {
        $this->authorize('update', $this->articlesRepository->findBySlug($slug));
        
        $this->articlesRepository->delete($slug);

        return redirect(route('articles.index'))->with('success_message', 'Новость удалена');
    }
}
