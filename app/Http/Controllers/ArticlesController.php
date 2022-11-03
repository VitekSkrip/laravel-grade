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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allArticles = $this->articlesRepository->paginateForArticlesList(5, ['*'], 'page', $request->get('page', 1));

        return view('pages.articles', compact('allArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = $this->articlesRepository->getModel();
        return view('pages.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, TagsRequest $tagsRequest, TagsSynchronizerServiceContract $tagsSynchronizerService)
    {
        $article = $this->articlesRepository->create($request->validated());

        $tagsSynchronizerService->sync($article, $tagsRequest->get('tags'));

        return back()->with('success_message', 'Новость успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $article = $this->articlesRepository->findBySlug($slug);
        return view('pages.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        $article = $this->articlesRepository->findBySlug($slug);
        return view('pages.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, string $slug, TagsRequest $tagsRequest, TagsSynchronizerServiceContract $tagsSynchronizerService)
    {
        $article = $this->articlesRepository->update($slug, $request->validated());

        $tagsSynchronizerService->sync($article, $tagsRequest->get('tags'));

        return redirect(route('articles.index'))->with('success_message', 'Новость успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $slug)
    {
        $this->articlesRepository->delete($slug);

        return redirect(route('articles.index'))->with('success_message', 'Новость удалена');
    }
}
