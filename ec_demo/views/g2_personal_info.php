<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles.css">
    <title>博多☆飯店 新規会員登録</title>
    <style>
        /* メインコンテナ */
        .registration-container {
            margin: 10vh auto;
            border: 10px solid #d4af37;
            height: 70vh;
            width: 60vw;
            text-align: center;
            border-radius: 10px;
        }

        /* 内部ボックス */
        .inner-box {
            border: 10px solid #ff0000;
            height: 67.8vh;
            width: 58.8vw;
            margin: 0 auto;
        }

        /* 四隅の装飾 */
        .corner {
            border: 10px solid #ffffff;
            background-color: #ffffff;
            height: 5px;
            width: 5px;
        }

        .corner.top-right {
            position: absolute;
            top: -0.5px;
            right: -0.5px;
        }

        .corner.bottom-left {
            position: absolute;
            bottom: -0.5px;
            left: -0.5px;
        }

        /* ボタン */
        .inner-box button {
            height: 5vh;
            width: 10vw;
            background-color: #ff0000;
            border: 2px solid #d4af37;
            border-radius: 0.5vw;
            font-size: 1.5vw;
            margin: 3vw;
            color: white;
        }

        .inner-box h1 {
            margin-top: 1vh;
        }

        .inner-box input {
            padding: 0 1vw;
            margin: 3vh;
            height: 5vh;
            width: 25vw;
            border: gray solid 2px;
            border-radius: 0.5vw;
        }

        .inner-box input[type="password"] {
            margin: 1vh
        }

        .back-link {
            display: block;
            margin: 1vw;
            margin-bottom: 0;
            text-align: left;
        }

        .register-link {
            display: block;
        }

        /* メディアクエリ */
        @media screen and (max-width: 786px) {
            .registration-container {}
        }

        @media screen and (max-width: 480px) {
            .registration-container {
                width: 77%;
                left: 0;
                margin: 0 auto;
            }
        }
    </style>
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
                <label for="post_code">郵便番号</label>
                <input type="text" name="first_post_code" id="post_code">ー
                <input type="text" name="last_post_code"><br>
                <label for="address">住所</label>
                <input type="text" name="prefectures" id="address" placeholder="セイ">
                <input type="text" name="Municipality" id="kana" placeholder="メイ"><br>
                <input type="text" name="address_below" id="kana" placeholder="メイ"><br>
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