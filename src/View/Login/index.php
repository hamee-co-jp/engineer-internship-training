<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <!-- ドキュメントは→ https://getbootstrap.jp/docs/5.0/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/posts.css">
    <script src="/js/posts.js"></script>
    <title><?= $this->get('pageName') ?></title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">N</a>
        </div>
    </nav>
    <br>
    <div class="container">
        <div style="margin: 0 auto">
            <form method="POST" action="/Login/sign_in" id="sign-in-form" class="post-form">
                <div class="input-group mb-2">
                    <label for="sign-in-form" class="input-group-text">ユーザー名</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="あなたの名前を入力してください。" required>
                </div>
                <button type="submit" class="btn btn-primary">ログインする</button>
            </form>
        </divstyle=>
    </div>
</body>

</html>