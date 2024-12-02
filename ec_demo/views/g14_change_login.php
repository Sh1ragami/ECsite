<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g14_style.css">
    <title>博多☆飯店 ログイン情報変更画面</title>
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