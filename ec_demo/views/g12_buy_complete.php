<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/g12_style.css">
    <title>Document</title>
</head>

<body>
    <div class="area">
        <header>
            <?php include "header.php" ?>
        </header>

        <main>
            <div class="space"></div>

            <h1>購入が完了しました</h1>
            <div class="space"></div>
            <form action="./cart">
                <button>カートに戻る</button>
            </form>
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