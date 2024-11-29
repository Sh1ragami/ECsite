<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles.css">
    <title>商品リスト</title>
    <style>
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

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-button {
            background-color: #007bff;
            color: white;
        }

        .delete-button {
            background-color: #f00;
            color: white;
        }

        .purchase-button {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #f00;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        main a {
            display: block;
            margin: 0;
        }
    </style>
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
                $quantity = isset($cart[$cm_ID]['quantity']) ? $cart[$cm_ID]['quantity'] : 0;
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