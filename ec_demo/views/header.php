<div class="header_top">
    <a href="./"><img src="./images/header_logo.png" alt="博多☆飯店のロゴ画像"></a>
</div>
<div class="header_bottom">
    <div class="search-container">
        <form action="./search" method="get" class="search-form-1">
            <label>
                <input type="search" placeholder="キーワードを入力" name="query" value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>">
            </label>
            <button type="submit">検索</button>
        </form>
    </div>
    <div class="button-container">
        <form action="./cart" class="cart-button">
            <button type="submit">🛒</button>
        </form>
        <button class="hamburger-menu">三</button>
    </div>
</div>
<div id="sidebar" class="sidebar">

    <!-- サイドバーの内容 -->
    <form action="./change" method="get">
        <button>ログイン情報変更</button><br>
    </form>
    <form action="./my" method="get">
        <button>マイページ</button><br>
    </form>
    <?php if (isset($_SESSION['user_ID'])): ?>
        <form action="./logout" method="get">
            <button>ログアウト</button><br>
        </form>
    <?php else: ?>
        <form action="./login" method="get">
            <button>ログイン</button><br>
        </form>
    <?php endif; ?>
</div>


<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        overflow-x: hidden;
    }

    .header_top {
        background-color: #8B0000;
        padding: 10px 0;
        text-align: center;
        border-top-left-radius: 0.5vw;
        border-top-right-radius: 0.5vw;
    }

    .header_top img {
        width: 35vw;
        height: auto;
    }

    .header_top img:hover {
        opacity: 0.7;
        transition: 0.3s;
    }

    .header_top h1 {
        color: white;
        margin: 0;
    }

    .header_bottom {
        background-color: #E7CB6D;
        /* 黄色 */
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        border-bottom-left-radius: 0.5vw;
        border-bottom-right-radius: 0.5vw;
    }

    .search-container {
        flex: 1;
        display: flex;
        justify-content: center;
    }



    .button-container {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .hamburger-menu {
        font-size: 30px;
        border: none;
        background: none;
        cursor: pointer;
    }

    /* サイドバーのスタイル */
    .sidebar {
        position: fixed;
        top: 0;
        right: -30vw;
        width: 15vw;
        height: 100%;
        background-color: #E7CB6D;
        color: white;
        transition: right 0.3s ease;
        padding: 20px;
        z-index: 1000;
    }

    .sidebar.open {
        right: 0;
        /* サイドバーが表示される */
    }

    .sidebar button {
        width: 15vw;
        margin: 0.8vh;
        height: 7vh;
        background-color: #CD5C5C;
        border: #000000 solid 2px;
        font-size: 1.3rem;
        color: white;
    }

    /* サイドバー以外の領域がタップされたときに元に戻る */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 999;
    }

    .overlay.show {
        display: block;
    }
</style>

<div class="overlay" id="overlay"></div>

<script>
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    // ハンバーガーメニューをクリックしたとき
    hamburgerMenu.addEventListener('click', () => {
        sidebar.classList.toggle('open'); // サイドバーを開閉
        overlay.classList.toggle('show'); // オーバーレイを表示
    });

    // オーバーレイをクリックしたとき、サイドバーを閉じる
    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    });
</script>