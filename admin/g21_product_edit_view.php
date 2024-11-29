<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>商品情報変更画面</title>
</head>

<body>
    <h2>商品変更</h2>
    <a href="g17_user_management_view.php">ユーザー管理</a>
    <a href="g18_admin_register_view.php">アカウント登録</a>
    <a href="g19_product_list_view.php">商品管理</a>
    <a href="g20_product_register_view.php">商品登録</a>
    <a href="g21_product_edit_view.php">商品管理</a>
    <a href="g22_sales_management_view.php">売上管理</a>
    <br>
    <form action="g21_sub.php" method="post">
    商品名<br>
    <textarea name="name" rows="4" cols="40"></textarea>
    <br>
    金額<br>
    <input type="text" name="kingaku">
    <br>
    カテゴリー<br>
    <select name="kate">
        <?php
        $ken = array("油","中華","和風","塩","イタリアン","フレンチ","トルコ");
            foreach ($ken as $name => $value) {
                echo "<option value={$value}>{$value}</option>";
            }
        ?>
    </select>
    <br>
    在庫<br>
    <input type="number" name="zaiko" min="1" max="1000">
    <br>
    商品説明<br>
    <textarea name="setumei" rows="4" cols="40"></textarea>
    <br>
    製造元<br>
    <textarea name="moto" rows="4" cols="40"></textarea>
    <br>
    原材料<br>
    <textarea name="genzai" rows="4" cols="40"></textarea>
    <br>
    内容量<br>
    <textarea name="naiyou" rows="4" cols="40"></textarea>
    <br>
    消費期限<br>
    <textarea name="kigen" rows="4" cols="40"></textarea>
    <br>
    保存方法<br>
    <textarea name="hozon" rows="4" cols="40"></textarea>
    <br>
    <input type="submit" value="変更">

    </form>
</body>

</html>