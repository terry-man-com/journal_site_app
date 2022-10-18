<?php

namespace App\Http\Controllers;

// Articleクラスを読み込む
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Symfony\Component\HttpFoundation\RequestStack;

class ArticleController extends Controller
{
    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $articles = Article::all();
        // Articleディレクトリーの中のindexページを指定し、articlesの連想配列を代入
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article;

        $article->title = $request->title;
        $article->body = $request->body;
        
        $article->save();

        return redirect('/articles');
    }

    // showページへ移動
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);

        $article->title = $request->title;
        $article->body = $request->body;

        $article->save();

        return redirect('/articles');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles');
    }
}
