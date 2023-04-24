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
    public function __construct(
        private ArticlesRepositoryContract $articlesRepository
    ) {
    }

    public function index(Request $request)
    {
        $allArticles = $this->articlesRepository->paginateForArticlesList(5, ['*'], 'page', $request->get('page', 1));

        return view('pages.articles', compact('allArticles'));
    }

    public function show(string $slug)
    {
        $article = $this->articlesRepository->findBySlug($slug);
        return view('pages.article', compact('article'));
    }
}
