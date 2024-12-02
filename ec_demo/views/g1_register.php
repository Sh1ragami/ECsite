<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g1_style.css">
    <title>博多☆飯店 新規会員登録</title>
    
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