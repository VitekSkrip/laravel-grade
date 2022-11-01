<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\TagsSynchronizer;
use App\Contracts\Repositories\ArticlesRepositoryContract;

class ArticlesController extends Controller
{
    private $tagsSynchronizer;

    public function __construct(private ArticlesRepositoryContract $articlesRepository, TagsSynchronizer $tagsSynchronizer)
    {
        $this->tagsSynchronizer = $tagsSynchronizer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allArticles = $this->articlesRepository->getLatest();
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
    public function store(ArticleRequest $request, TagsRequest $tagsRequest)
    {
        $article = $this->articlesRepository->create($request->validated());

        $this->tagsSynchronizer->sync($tagsRequest->tags, $article);

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
    public function update(ArticleRequest $request, string $slug, TagsRequest $tagsRequest)
    {
        $article = $this->articlesRepository->update($slug, $request->validated());

        $this->tagsSynchronizer->sync($tagsRequest->tags, $article);

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
