<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g2_style.css">
    <title>博多☆飯店 新規会員登録</title>
</head>

<body>
    <div class="registration-container">
        <div class="inner-box">
            <div class="corner top-right"></div>
            <div class="corner bottom-left"></div>
            <a href="./register" class="back-link">＜ 戻る</a>
            <h1>個人情報入力</h1>
            <form action="./verification" method="post">
                <input type="hidden" name="mail" value="<?php $_POST["mail"] ?>">
                <input type="hidden" name="password" value="<?php $_POST["password"] ?>">
                <label for="kanji">氏名</label>
                <input type="text" name="last_kanji" id="kanji" placeholder="姓">
                <input type="text" name="first_kanji" placeholder="名"><br>
                <label for="kana">フリガナ</label>
                <input type="text" name="last_kana" id="kana" placeholder="セイ">
                <input type="text" name="first_kana" placeholder="メイ"><br>
                <label for="address">住所</label>
                <input type="text" name="prefectures" id="address" placeholder="都道府県">
                <input type="text" name="municipality" placeholder="市区町村"><br>
                <input type="text" name="address_below" placeholder="以降住所"><br>
                <label for="address">お支払い方法</label>
                <select name="pay_info">
                    <option value="paypay">paypay</option>
                    <option value="銀行振込">銀行振込</option>
                    <option value="代金引換">代金引換</option>
                </select>
                <button>登録</button>
            </form>
        </div>
    </div>
</body>

</html>