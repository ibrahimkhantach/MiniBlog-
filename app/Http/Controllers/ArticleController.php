<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    {
        // Load 10 articles per 'page'. Using ID for strict ordering.
        $articles = Article::orderBy('id', 'desc')->cursorPaginate(10);

        // If the request comes from JavaScript (AJAX), return JSON only
        if ($request->ajax()) {
            return response()->json([
                'data' => $articles->items(),
                'next_page_url' => $articles->nextPageUrl(),
                'prev_page_url' => $articles->previousPageUrl(),
            ]);
        }

        // Otherwise, return the full HTML page (first load)
        return view('articles.index', compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->validated());

        return redirect()->route('articles.index');
    }
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }
    public function update(StoreArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        return redirect()->route('articles.index');
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
