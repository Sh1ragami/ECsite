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
            <a href="./" class="back-link">＜ ホームに戻る</a>
            <h1>新規会員登録</h1>
            <form action="./info" method="post" onsubmit="return checkPassword()">
                <input type="email" name="mail" placeholder="メールアドレス"
                    pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="有効なメールアドレスを入力してください" required><br>
                <input type="password" name="password" id="password" placeholder="パスワード"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$" title="8文字以上で、大文字、小文字、数字を含む必要があります"
                    required><br>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="パスワードの再確認"
                    required><br>
                <button>次へ</button>
            </form>
            <a href="./login" class="register-link">ログインする</a>
        </div>
    </div>

    <script>
        function checkPassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                alert("パスワードが一致しません。もう一度確認してください。");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>