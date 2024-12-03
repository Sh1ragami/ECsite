<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g13_style.css">
    <title>博多☆飯店 新規会員登録</title>
</head>

<body>
    <div class="area">
        <header>
            <?php include "header.php"; ?>
        </header>
        <main>
            <h1>情報変更</h1>
            <form action="./change" method="post">
                <!-- Hidden inputs -->
                <input type="hidden" name="mail"
                    value="<?php echo htmlspecialchars($user['mail'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="password"
                    value="<?php echo htmlspecialchars($user['password'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                <!-- 氏名 -->
                <div class="input-group">
                    <label for="kanji">氏名</label>
                    <input type="text" name="last_kanji" id="kanji" placeholder="姓"
                        value="<?php echo htmlspecialchars($name[0] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="first_kanji" placeholder="名"
                        value="<?php echo htmlspecialchars($name[1] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <!-- フリガナ -->
                <div class="input-group">
                    <label for="kana">フリガナ</label>
                    <input type="text" name="last_kana" id="kana" placeholder="セイ"
                        value="<?php echo htmlspecialchars($name[2] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="first_kana" placeholder="メイ"
                        value="<?php echo htmlspecialchars($name[3] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <!-- 住所 -->
                <div class="input-group">
                    <label for="address">住所</label>
                    <input type="text" name="prefectures" id="address" placeholder="都道府県"
                        value="<?php echo htmlspecialchars($address[0] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="municipality" placeholder="市区町村"
                        value="<?php echo htmlspecialchars($address[1] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="text" name="address_below" placeholder="番地・建物名"
                        value="<?php echo htmlspecialchars($address[2] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
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