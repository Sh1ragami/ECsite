<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a rel="stylesheet" href="../style/reset.css"></a>
    <title>管理者ログイン画面</title>
</head>

<body>
    <h1>管理者ログイン</h1>

    <form action="g17_user_management_view.php" method="post">
        ID<br>
        <input type="text" name="id"><br>
        パスワード<br>
        <input type="password" name="pass"><br><br>
        <input type="submit" value="ログイン">
    </form>

</body>

</html>