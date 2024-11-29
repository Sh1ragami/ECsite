<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles.css">
    <title>購入画面</title>
    <style>
        fieldset {
            margin: 0 auto;
            width: 60vw;
            max-width: 600px;
            margin-top: 5vh;
            margin-bottom: 5vh;
            text-align: center;
        }

        h2 {
            font-size: 25px;
            margin: 5px;
            font-weight: 400;
        }

        h3 {
            font-size: 23px;
            margin: 5px;
            font-weight: 400;
        }

        fieldset input {
            border-bottom: 2px solid black;
            width: 35vw;
            max-width: 400px;
            margin: 3vh 0;
        }

        .double_row input {
            width: 15vw;
            max-width: 180px;
        }

        .double_row input:nth-child(2) {
            margin-left: 2vw;
        }

        .message {
            color: green;
            margin-top: -3vh;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            /* ボタン間のスペース */
        }

        .button {
            margin-bottom: 3vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 15vw;
            max-width: 175px;
            height: 10vw;
            background-color: #e0e0e0;
            border: 2px solid #000;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            color: #000;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #d0d0d0;
        }

        .button img {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-left: 5vw;
            width: 20px;
        }

        fieldset:nth-of-type(2) {
            text-align: left;
        }

        fieldset:nth-of-type(2) h3 {
            text-align: center;
        }

        .product-card {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px auto;
            max-width: 500px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            margin-right: 10px;
        }

        .product-info {
            flex: 1;
            text-align: left;
        }

        .product-info p {
            margin: 5px 0;
        }

        .quantity-input {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity-input input {
            width: 50px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="area">
        <header>
            <?php include 'header.php'; ?>
        </header>

        <?php if (isset($message)) : ?>
            <p class="message">
                <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>

        <?php if (empty($commodities)): ?>
            <p class="no-items">選択された商品はありません。</p>
        <?php else: ?>
            <?php foreach ($commodities as $item): ?>
                <div class="product-card">
                    <img src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="商品画像">
                    <div class="product-info">
                        <p><strong><?= htmlspecialchars($item['cm_name'], ENT_QUOTES, 'UTF-8') ?></strong></p>
                        <p>価格: <?= htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') ?>円</p>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <form action="./check" method="post">
            <fieldset>
                <h3>住所情報</h3>
                <div class="double_row">
                    <input type="text" name="last_kanji"
                        value="<?= htmlspecialchars($is_logged_in ? $name['last_kanji'] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="姓 (漢字)">
                    <input type="text" name="first_kanji"
                        value="<?= htmlspecialchars($is_logged_in ? $name['first_kanji'] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="名 (漢字)">
                </div>
                <div class="double_row">
                    <input type="text" name="last_kana"
                        value="<?= htmlspecialchars($is_logged_in ? $name['last_kana'] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="姓 (カナ)">
                    <input type="text" name="first_kana"
                        value="<?= htmlspecialchars($is_logged_in ? $name['first_kana'] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="名 (カナ)">
                </div>
                <input type="text" name="zip_code"
                    value="<?= htmlspecialchars($is_logged_in ? $user['zip_code'] : '', ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="郵便番号">
                <input type="text" name="prefectures"
                    value="<?= htmlspecialchars($is_logged_in ? $address['prefectures'] : '', ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="都道府県">
                <input type="text" name="street_address"
                    value="<?= htmlspecialchars($is_logged_in ? $address['street_address'] : '', ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="住所">
                <input type="text" name="mansion"
                    value="<?= htmlspecialchars($is_logged_in ? $user['mansion'] : '', ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="マンション名・部屋番号 (任意)">
            </fieldset>

            <fieldset>
                <h3>支払い方法</h3>
                <input type="radio" name="pay" checked value="default">代金引換
            </fieldset>

            <?php foreach ($cm_IDs as $id): ?>
                <input type="hidden" name="cm_IDs[]" value="<?= htmlspecialchars($id) ?>">
            <?php endforeach; ?>


            <button>購入確認へ</button>
        </form>

        <footer>
            <?php include 'footer.php'; ?>
        </footer>
    </div>

</body>

</html>