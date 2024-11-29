<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles.css">
    <title>博多☆飯店 ログイン情報変更画面</title>
    <style>
        /* メインコンテナ */
        main {
            margin: 10vh auto;
            height: 70vh;
            width: 60vw;
            text-align: center;
        }

        /* ボタン */
        main button {
            height: 5vh;
            width: 10vw;
            background-color: #ff0000;
            border: 2px solid #d4af37;
            border-radius: 0.5vw;
            font-size: 1.5vw;
            margin: 3vw;
            color: white;
        }
        main h1 {
            text-align: center;
            margin: 0 0;
        }


        main form input {
            padding: 0 1vw;
            margin: 3vh;
            height: 5vh;
            width: 25vw;
            border: gray solid 2px;
            border-radius: 0.5vw;
        }

        main form input[type="password"] {
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
    <div class="area">
        <header>
            <?php include "header.php" ?>
        </header>
        <main>
            <a href="./" class="back-link">＜ ホームに戻る</a>
            <h1>情報変更</h1>
            <form action="./change" method="post" onsubmit="return checkPassword()">
                <input type="email" name="mail" placeholder="メールアドレス"
                    pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="有効なメールアドレスを入力してください" required><br>
                <input type="password" name="password" id="password" placeholder="パスワード"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$" title="8文字以上で、大文字、小文字、数字を含む必要があります"
                    required><br>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="パスワードの再確認"
                    required><br>
                <button>変更</button>
            </form>
        </main>

    </div>

    <footer>
        <?php include "footer.php" ?>
    </footer>
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