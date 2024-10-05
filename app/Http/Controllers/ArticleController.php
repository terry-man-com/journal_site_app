<?php

namespace App\Http\Controllers;

// Articleクラスの読み込み
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // indexページへ移動
    public function index()
    {
        $articles = Article::all();
        return view('article.index', ['articles' => $articles]);
    }

    // create(新規投稿ページ)
    public function create()
    {
        return view('article.create');
    }

    // store(新規投稿の登録機能)
    public function store(Request $request)
    {
        // フォームで送信された内容を格納するインスタンスを生成
        $article = new Article;

        // フォームの値を生成したインスタンスに格納
        $article->title = $request->title;
        $article->body = $request->body;

        //値を格納後、保存する。（モデルにフォーム内容を追加する。）
        $article->save();

        return redirect('/articles');
    }
    //show(詳細)ページへ移動
    public function show($id)
    {
        $article = Article::find($id);
        return view('article.show', ['article' => $article]);
    }

    // edit(編集)ページへ遷移
    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit', ['article' => $article]);
    }

    // update(編集画面で編集したものを保存)機能
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $article->title = $request->title;
        $article->body  = $request->body;

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
