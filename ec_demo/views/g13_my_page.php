<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles.css">
    <title>博多☆飯店 新規会員登録</title>
    <style>
        main {
            max-width: 600px;
            margin: 5vh auto;
            padding: 2rem;
        }

        main h1 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 1rem;
            text-align: center;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 1rem;
            color: #007BFF;
            text-decoration: none;
        }

        main form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        main form label {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
        }

        main form input,
        main form select,
        main form button {
            font-size: 1rem;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .input-short {
            width: calc(50% - 0.5rem);
            display: inline-block;
        }

        main form select {
            background-color: #fff;
        }

        main form button {
            padding: 10px 20px;
            background-color: red;
            border: gold solid 2px;
            border-radius: 1vw;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
        }

        main form button:hover {
            background-color: #e1b20f;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-group.inline {
            flex-direction: row;
            gap: 0.5rem;
        }

        .input-group label {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="area">
        <header>
            <?php include "header.php"; ?>
        </header>
        <main>
            <h1>個人情報入力</h1>
            <form action="./verification" method="post">
                <!-- Hidden inputs -->
                <input type="hidden" name="mail"
                    value="<?php echo htmlspecialchars($user['mail'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="password"
                    value="<?php echo htmlspecialchars($user['password'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                <!-- 氏名 -->
                <div class="input-group">
                    <label for="kanji">氏名</label>
                    <input type="text" name="last_kanji" id="kanji" placeholder="姓"
                        value="<?php echo htmlspecialchars($name['last_kanji'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="first_kanji" placeholder="名"
                        value="<?php echo htmlspecialchars($name['first_kanji'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <!-- フリガナ -->
                <div class="input-group">
                    <label for="kana">フリガナ</label>
                    <input type="text" name="last_kana" id="kana" placeholder="セイ"
                        value="<?php echo htmlspecialchars($name['last_kana'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="first_kana" placeholder="メイ"
                        value="<?php echo htmlspecialchars($name['first_kana'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <!-- 郵便番号 -->
                <div class="input-group inline">
                    <label for="post_code">郵便番号</label>
                    <input type="text" name="first_post_code" class="input-short" placeholder="000"
                        value="<?php echo htmlspecialchars($name['zip_code'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="last_post_code" class="input-short" placeholder="0000"
                        value="<?php echo htmlspecialchars($_POST['last_post_code'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <!-- 住所 -->
                <div class="input-group">
                    <label for="address">住所</label>
                    <input type="text" name="prefectures" id="address" placeholder="都道府県"
                        value="<?php echo htmlspecialchars($address['prefectures'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="Municipality" placeholder="市区町村"
                        value="<?php echo htmlspecialchars($address['municipality'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="address_below" placeholder="番地・建物名"
                        value="<?php echo htmlspecialchars($address['address_below'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <!-- 支払い方法 -->
                <div class="input-group">
                    <label for="pay_info">お支払い方法</label>
                    <select name="pay_info" id="pay_info">
                        <option value="paypay" <?php echo (isset($user['pay_info']) && $user['pay_info'] === 'paypay')
                                                    ? 'selected' : ''; ?>>PayPay</option>
                        <option value="銀行振込" <?php echo (isset($user['pay_info']) && $user['pay_info'] === '銀行振込')
                                                    ? 'selected' : ''; ?>>銀行振込</option>
                        <option value="代金引換" <?php echo (isset($user['pay_info']) && $user['pay_info'] === '代金引換')
                                                    ? 'selected' : ''; ?>>代金引換</option>
                    </select>
                </div>

                <button type="submit">変更</button>
            </form>
        </main>
        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </div>
</body>

</html>