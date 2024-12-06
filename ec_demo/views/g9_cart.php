<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g9_style.css">
    <title>博多★飯店 カート</title>
</head>

<body>
    <div class="area">
        <header>
            <?php include 'header.php'; ?>
        </header>
        <main>
            <a href="javascript:history.back()">閉じる</a>
            <?php
            // 商品リストの生成
            foreach ($commodities as $commodity):
                $cm_ID = $commodity['cm_ID'];
                $quantity = $cart[0]['quantity'];
                array_shift($cart);
            ?>
                <div class="product-card">
                    <img src="<?= htmlspecialchars($commodity['image'], ENT_QUOTES, 'UTF-8') ?>" alt="商品画像">
                    <div class="product-info">
                        <p><strong><?= htmlspecialchars($commodity['cm_name'], ENT_QUOTES, 'UTF-8') ?></strong></p>
                        <p>価格: <?= htmlspecialchars($commodity['price'], ENT_QUOTES, 'UTF-8') ?>円</p>
                        <div class="quantity-input">
                            個数:
                            <form action="./cart" method="post" style="display: inline;">
                                <input type="number" name="quantity" min="1" max="99"
                                    value="<?= htmlspecialchars($quantity, ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="cm_ID" value="<?= htmlspecialchars($cm_ID, ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="action" value="update">
                                <button type="submit" class="update-button">更新</button>
                            </form>
                        </div>
                    </div>
                    <form action="./cart" method="post">
                        <input type="hidden" name="cm_ID" value="<?= htmlspecialchars($cm_ID, ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="delete-button">削除</button>
                    </form>
                </div>
            <?php endforeach; ?>

            <form action="./buy" method="post">
                <?php foreach ($commodities as $item): ?>
                    <input type="hidden" name="cm_IDs[]" value="<?= htmlspecialchars($item['cm_ID']) ?>">
                <?php endforeach; ?>
                <button type="submit" class="purchase-button">購入手続き</button>
            </form>
        </main>

        <footer>
            <?php include 'footer.php'; ?>
        </footer>
    </div>
</body>

</html>