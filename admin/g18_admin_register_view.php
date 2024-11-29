<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>管理者アカウント登録画面</title>
</head>

<body>
    <h1>管理者アカウント登録</h1>

    <a href="g17_user_management_view.php">ユーザー管理</a>
    <a href="g18_admin_register_view.php">アカウント登録</a>
    <a href="g19_product_list_view.php">商品管理</a>
    <a href="g20_product_register_view.php">商品登録</a>
    <a href="g21_product_edit_view.php">商品管理</a>
    <a href="g22_sales_management_view.php">売上管理</a>
    <br>

    <form action="g18_sub.php" method="post">
    ID<br>
    <input type="text" name="id"><br>
    パスワード<br>
    <input type="password" name="pass"><br>
    パスワード確認<br>
    <input type="password" name="pass2"><br>
    <br>
    <input type="submit" value="登録">
    </form>

    
</body>

</html>