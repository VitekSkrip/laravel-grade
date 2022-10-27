<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\TagsSynchronizer;

class ArticlesController extends Controller
{
    private $tagsSynchronizer;

    public function __construct(TagsSynchronizer $tagsSynchronizer)
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
        $allArticles = Article::latest('published_at')->get();
        return view('pages.articles', compact('allArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
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
        $article = Article::create($request->validated());

        $this->tagsSynchronizer->sync($tagsRequest->tags, $article);

        return back()->with('success_message', 'Новость успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('pages.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('pages.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article, TagsRequest $tagsRequest)
    {
        $article->update($request->validated());

        $this->tagsSynchronizer->sync($tagsRequest->tags, $article);

        return redirect(route('articles.index'))->with('success_message', 'Новость успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'))->with('success_message', 'Новость удалена');
    }
}
