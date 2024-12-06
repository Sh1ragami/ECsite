<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g6_style.css">
    <title>博多☆飯店 ログイン</title>
</head>

<body>
    <div class="registration-container">
        <div class="inner-box">
            <div class="corner top-right"></div>
            <div class="corner bottom-left"></div>
            <a href="./" class="back-link">＜ ホームに戻る</a>
            <h1>ログイン</h1>
            <form action="./login" method="post">
                <input type="email" name="mail" placeholder="メールアドレス"
                    pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="有効なメールアドレスを入力してください" required><br>
                <input type="password" name="password" placeholder="パスワード" required><br>
                <button>ログイン</button>
                <p style="color: red; font-weight: bold;"><?= $message ?></p>
            </form>
            <a href="./register" class="register-link">新規登録はこちらから</a>
        </div>
    </div>
</body>

</html>