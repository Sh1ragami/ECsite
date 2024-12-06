<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g12_style.css">
    <title>博多★飯店 購入完了</title>
</head>

<body>
    <div class="area">
        <header>
            <?php include "header.php" ?>
        </header>

        <main>
            <div class="space"></div>

            <h1>購入が完了しました</h1>
            <?php if (empty($commodities)): ?>
            <?php else: ?>
                <?php foreach ($commodities as $item): ?>
                    <div class="product-card">
                        <img src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="商品画像">
                        <div class="product-info">
                            <p><strong>
                                    <?= htmlspecialchars($item['cm_name'], ENT_QUOTES, 'UTF-8') ?>
                                </strong></p>
                            <p>価格:
                                <?= htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') ?>円
                            </p>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="space"></div>
            <form action="./home">
                <button>ホームに戻る</button>
            </form>
        </main>

        <footer>
            <?php include "footer.php" ?>
        </footer>
    </div>
</body>

</html>