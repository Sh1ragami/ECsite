<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="チャーハンを専門的に販売するECサイトです。">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g8_style.css">
    <title>博多★飯店 商品詳細</title>
</head>

<body>
    <div class="area">

        <header>
            <?php include "header.php" ?>
        </header>

        <main>
            <div class="commodity-info">
                <img src="<?= htmlspecialchars($commodity['image'], ENT_QUOTES, 'UTF-8') ?>"
                    alt="<?= htmlspecialchars($commodity['cm_name'], ENT_QUOTES, 'UTF-8') ?>の画像">
                <div class="details">
                    <h2>
                        <?= htmlspecialchars($commodity['cm_name'], ENT_QUOTES, 'UTF-8') ?>
                    </h2>
                    <p><span class=price>
                            <?= htmlspecialchars($commodity['price'], ENT_QUOTES, 'UTF-8') ?>
                        </span>円</p>
                    <p>送料無料</p>
                    <div class="actions">
                        <!-- 数量入力欄 -->
                        <input id="quantity" type="number" min="1" value="1" name="quantity" placeholder="数量"><br>

                        <!-- カートに追加するフォーム -->
                        <form id="addCartForm" action="./cart" method="post">
                            <input type="hidden" name="cm_ID" value="<?= htmlspecialchars($commodity['cm_ID'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="action" value="add">
                            <input type="hidden" name="quantity" value="1">
                            <button name="add_cart" value="true" onclick="setQuantity('addCartForm')">カートに追加</button>
                        </form>

                        <!-- すぐに購入するフォーム -->
                        <form id="buyNowForm" action="./buy" method="post">
                            <input type="hidden" name="cm_IDs[]" value="<?= htmlspecialchars($commodity['cm_ID'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button name="now_buy" value="true" onclick="setQuantity('buyNowForm')">すぐに購入</button>

                        </form>
                    </div>

                    <script>
                        // JavaScriptで数量をフォームにセットする関数
                        function setQuantity(formId) {
                            const quantity = document.getElementById('quantity').value; // 数量を取得
                            const form = document.getElementById(formId);
                            form.querySelector('input[name="quantity"]').value = quantity; // フォームに値をセット
                        }
                    </script>

                </div>
            </div>
    </div>

    <fieldset>
        <p><strong>商品概要:</strong> <?= htmlspecialchars($commodity['overview'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>製造元:</strong> <?= htmlspecialchars($commodity['manufacturer'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>消費期限:</strong> <?= htmlspecialchars($commodity['limit'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>保存方法:</strong> <?= htmlspecialchars($commodity['keep'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>原材料:</strong> <?= htmlspecialchars($commodity['materials'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>内容量:</strong> <?= htmlspecialchars($commodity['quantity'], ENT_QUOTES, 'UTF-8') ?></p>
    </fieldset>

    <h1>関連商品</h1>

    <div class="commodity-container">
        <?php foreach ($commodities as $commodity): ?>
            <div class="commodity-card">
                <form action="./detail" method="get">
                    <input type="hidden" name="category" value="<?= htmlspecialchars($commodity['category'], ENT_QUOTES, 'UTF-8') ?>">
                    <button type="submit" name="cm_ID"
                        value="<?= htmlspecialchars($commodity['cm_ID'], ENT_QUOTES, 'UTF-8') ?>">
                        <img src="<?= htmlspecialchars($commodity['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($commodity['cm_name'], ENT_QUOTES, 'UTF-8') ?>の画像">
                        <fieldset>
                            <p>商品名:
                                <?= htmlspecialchars($commodity['cm_name'], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                            <p>値段:
                                <?= htmlspecialchars($commodity['price'], ENT_QUOTES, 'UTF-8') ?>円
                            </p>
                            <p>
                                <?= htmlspecialchars($commodity['overview'], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                        </fieldset>
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <?php include "footer.php" ?>
    </footer>

    </main>
    </div>
</body>

</html>