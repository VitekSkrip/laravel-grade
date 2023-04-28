<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ArticlesRepositoryContract;

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
