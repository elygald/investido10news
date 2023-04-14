<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Bus;
use Illuminate\Database\Eloquent\Builder;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('/article/index',[
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/article/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|unique:article|max:100',
            'description' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        return redirect()->route('article.show',[$article]);

    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('/article/show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('/article/edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|unique:article|max:100',
            'description' => 'required',
        ]);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        return redirect()->route('article.show',[$article]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function search(Request $request)
    {
        $articles = Article::query()
            ->when(
                $request->term,
                function (Builder $builder) use ($request) {
                    $builder->where('title', 'like', "%{$request->term}%")
                        ->orWhere('description', 'like', "%{$request->term}%");
                }
            )
            ->simplePaginate(5);

        return view('/article/search', [
            'articles' => $articles,
        ]);
    }
}
