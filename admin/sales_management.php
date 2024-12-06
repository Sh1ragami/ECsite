<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header('Location: login.php');
    exit;
}

require_once 'util/Database.php';
$DB = new Database();
$pdo = $DB->getConnection();

try {
    if (isset($_GET['query'])) {
        $stmt = $pdo->prepare("SELECT * FROM proceed WHERE cm_ID=? ORDER BY date DESC");
        $stmt->execute([$_GET['query']]);
        $proceeds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM proceed ORDER BY date DESC");
        $stmt->execute();
        $proceeds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    echo "エラー: " . htmlspecialchars($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>売上管理</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <header>
            <img src="images/header_logo.png" alt="博多☆飯店">
            <h1>売上管理</h1>
        </header>
        <main>
            <?php include_once 'util/sidebar.php' ?>
            <section class="content">
                <div class="search-bar">
                    <input type="search" placeholder="商品ID検索" value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>">
                    <button>🔍</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" disabled></th>
                            <th>ユーザーID</th>
                            <th>商品ID</th>
                            <th>数量</th>
                            <th>価格</th>
                            <th>日付</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proceeds as $proceed): ?>
                            <tr>
                                <td><input type="checkbox" disabled></td>
                                <td>
                                    <?php echo htmlspecialchars($proceed['user_ID']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($proceed['cm_ID']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($proceed['quantity']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($proceed['price']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($proceed['date']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>

</html>