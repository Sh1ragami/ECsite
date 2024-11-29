<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>商品一覧画面</title>
</head>

<body>
    <h2>商品一覧</h2>
    <a href="g17_user_management_view.php">ユーザー管理</a>
    <a href="g18_admin_register_view.php">アカウント登録</a>
    <a href="g19_product_list_view.php">商品管理</a>
    <a href="g20_product_register_view.php">商品登録</a>
    <a href="g21_product_edit_view.php">商品管理</a>
    <a href="g22_sales_management_view.php">売上管理</a>

    <input type="text" name="search" placeholder="検索">
    <input type="submit" value="🔍">
    
    <form action="g21_product_edit_view.php" method="post">
        <input type="submit" value="編集">
    </form>
    
    <input type="submit" value="削除">

    <form action="g20_product_register_view.php" method="post">
        <input type="submit" value="新規登録">
    </form>

    <br>

    <?php
        $pdo = new PDO(
            'mysql:host=mysql309.phy.lolipop.lan;
                     dbname=LAA1553893-ecsite;',
            'LAA1553893',
            'universe'
        );

        $sql = $pdo->query('SELECT * FROM `commodity`');

        foreach($sql as $row){
            echo $row['cm-ID']," ";
            echo $row['cm-name']," ";
            echo $row['price']," ";
            echo $row['stock'],"<br>";
        }

    ?>

</body>

</html>