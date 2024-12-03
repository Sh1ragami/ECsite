<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g10_style.css">
    <title>購入画面</title>
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
                        value="<?= htmlspecialchars($is_logged_in ? $name[0] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="姓 (漢字)" required>
                    <input type="text" name="first_kanji"
                        value="<?= htmlspecialchars($is_logged_in ? $name[1] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="名 (漢字)" required>
                </div>
                <div class="double_row">
                    <input type="text" name="last_kana"
                        value="<?= htmlspecialchars($is_logged_in ? $name[2] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="姓 (カナ)" required>
                    <input type="text" name="first_kana"
                        value="<?= htmlspecialchars($is_logged_in ? $name[3] : '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="名 (カナ)" required>
                </div>
                <input type="text" name="prefectures"
                    value="<?= htmlspecialchars($is_logged_in ? $address[0] : '', ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="都道府県" required>
                <input type="text" name="street_address"
                    value="<?= htmlspecialchars($is_logged_in ? $address[1] : '', ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="住所" required>
                <input type="text" name="mansion"
                    value="<?= htmlspecialchars($is_logged_in ? $mansion[2] : '', ENT_QUOTES, 'UTF-8') ?>"
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