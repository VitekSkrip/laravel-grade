<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\TagsSynchronizerService;

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
        $article = $this->articlesRepository->getModel();
        return view('pages.create', compact('article'));
    }

    public function store(ArticleRequest $request, TagsRequest $tagsRequest, TagsSynchronizerServiceContract $tagsSynchronizerService)
    {
        $article = $this->articlesRepository->create($request->validated());

        $tagsSynchronizerService->sync($article, $tagsRequest->get('tags'));

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
        return view('pages.edit', compact('article'));
    }

    public function update(ArticleRequest $request, string $slug, TagsRequest $tagsRequest, TagsSynchronizerServiceContract $tagsSynchronizerService)
    {
        $article = $this->articlesRepository->update($slug, $request->validated());

        $tagsSynchronizerService->sync($article, $tagsRequest->get('tags'));

        return redirect(route('articles.index'))->with('success_message', 'Новость успешно обновлена');
    }

    public function destroy(string $slug)
    {
        $this->articlesRepository->delete($slug);

        return redirect(route('articles.index'))->with('success_message', 'Новость удалена');
    }
}
