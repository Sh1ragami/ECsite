<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles.css">
    <title>Document</title>
    <style>
        main {
            text-align: center;
        }

        main h1 {
            font-size: 50px;
            text-align: center;
            margin: 0 0;
        }

        .space {
            height: 20vh;
        }

        main button {
            padding: 10px 20px;
            background-color: red;
            border: gold solid 2px;
            border-radius: 1vw;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
        }

        main button:hover {
            background-color: #e1b20f;
        }

        form:nth-of-type(1) {
            margin-right: 5vw;
        }
    </style>
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