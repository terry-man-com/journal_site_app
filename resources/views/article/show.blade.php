<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article show</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>論文詳細</h1>
    <p>タイトル：{{ $article->title }}</p>
    <p>{{ $article->body }}</p>
    <div class="button-group">
            <input type="button" onclick="location.href='{{ route('articles.index') }}'" value="一覧に戻る">
            <input type="button" onclick="location.href='{{ route('articles.edit', $article) }}'" value="編集する">
        <form action="{{ route('articles.destroy', $article) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
        </form>
    </div>
</body>
</html>