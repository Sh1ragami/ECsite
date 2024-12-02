<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”description“ content="チャーハンを専門的に販売するECサイトです。">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <title>博多★飯店 検索結果</title>
</head>

<body>
    <div class="area">

        <header>
            <?php include "header.php" ?>
        </header>

        <main>
            <h1>検索結果</h1>
            <div class="commodity-container">
                <?php foreach ($commodities as $commodity): ?>
                    <div class="commodity-card">
                        <form action="./detail" method="get">
                            <input type="hidden" name="category" value="<?= htmlspecialchars($commodity['category'], ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" name="cm_ID" value="<?= htmlspecialchars($commodity['cm_ID'], ENT_QUOTES, 'UTF-8') ?>">
                                <img src="<?= htmlspecialchars($commodity['image'], ENT_QUOTES, 'UTF-8') ?>"
                                    alt="<?= htmlspecialchars($commodity['cm_name'], ENT_QUOTES, 'UTF-8') ?>の画像">
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
        </main>

        <footer>
            <?php include "footer.php" ?>
        </footer>


    </div>
</body>

</html>