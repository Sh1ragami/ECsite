<?php
$current_page = basename($_SERVER['PHP_SELF']); // 現在のファイル名を取得
?>
<nav class="sidebar">
    <ul>
        <li class="<?= $current_page === 'user_management.php' ? 'active' : '' ?>">
            <a href="user_management.php">ユーザー管理</a>
        </li>
        <li class="<?= $current_page === 'commodity_management.php' ? 'active' : '' ?>">
            <a href="commodity_management.php">商品管理</a>
        </li>
        <li class="<?= $current_page === 'commodity_registration.php' ? 'active' : '' ?>">
            <a href="commodity_registration.php">商品登録</a>
        </li>
        <li class="<?= $current_page === 'sales_management.php' ? 'active' : '' ?>">
            <a href="sales_management.php">売上管理</a>
        </li>
        <li class="<?= $current_page === 'account_registration.php' ? 'active' : '' ?>">
            <a href="account_registration.php">アカウント登録</a>
        </li>
        <li class="<?= $current_page === 'logout.php' ? 'active' : '' ?>">
            <a href="util/logout.php">ログアウト</a>
        </li>
    </ul>
</nav>

<style>
    .active {
        background-color: #f9ca24;
    }
</style>