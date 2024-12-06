<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header('Location: login.php');
    exit;
}

require_once 'util/Database.php';
$DB = new Database();
$pdo = $DB->getConnection();
$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['cm_ID']) && is_array($_POST['cm_ID'])) {
        $action = $_POST['action'];
        $selectedItems = $_POST['cm_ID'];

        if ($action === 'edit' && count($selectedItems) === 1) {
            header("Location: commodity_registration.php?cm_ID={$selectedItems[0]}");
            exit;
        } elseif ($action === 'delete') {
            $stmt = $pdo->prepare("DELETE FROM commodity WHERE cm_ID IN (" . implode(",", array_fill(0, count($selectedItems), "?")) . ")");
            $stmt->execute($selectedItems);
            $success_message = "選択した商品が削除されました。";
        } else {
            $error_message = "編集対象の商品が複数選択されています。";
        }
    } else {
        $error_message =  "削除または編集対象の商品が選択されていません。";
    }
}

try {
    if (!empty($_GET['query'])) {
        $stmt = $pdo->prepare("SELECT * FROM commodity WHERE cm_name LIKE ?");
        $like = '%' . $_GET['query'] . '%';
        $stmt->execute([$like]);
        $commodities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM commodity");
        $stmt->execute();
        $commodities = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>商品管理</title>
    <link rel="stylesheet" href="css/styles.css">
    <script>
        function confirmDelete() {
            return confirm("選択した商品を本当に削除しますか？");
        }

        function toggleAll(source) {
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            for (const checkbox of checkboxes) {
                checkbox.checked = source.checked;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <header>
            <img src="images/header_logo.png" alt="博多☆飯店">
            <h1>商品管理</h1>
        </header>
        <main>
            <?php include_once 'util/sidebar.php'; ?>
            <section class="content">
                <!-- 検索フォーム -->
                <form action="#" method="get">
                    <div class="search-bar">
                        <input type="search" name="query" placeholder="商品名検索" value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>">
                        <button>🔍</button>
                    </div>
                </form>

                <!-- 商品管理フォーム -->
                <form action="#" method="post">
                    <div class="button-group">
                        <button class="edit-button" name="action" value="edit">編集</button>
                        <button class="delete-button" name="action" value="delete" onclick="return confirmDelete();">削除</button>
                        <span style="color: #4fec30; font-weight:bold"><?= $success_message ?></span>
                        <span style="color: red; font-weight:bold"><?= $error_message ?></span>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" onclick="toggleAll(this)"></th>
                                <th>商品ID</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>在庫数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($commodities)): ?>
                                <?php foreach ($commodities as $commodity): ?>
                                    <tr>
                                        <td><input type="checkbox" name="cm_ID[]" value="<?php echo htmlspecialchars($commodity['cm_ID']); ?>"></td>
                                        <td><?php echo htmlspecialchars($commodity['cm_ID']); ?></td>
                                        <td><?php echo htmlspecialchars($commodity['cm_name']); ?></td>
                                        <td><?php echo htmlspecialchars($commodity['price']); ?></td>
                                        <td><?php echo htmlspecialchars($commodity['quantity']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">商品が見つかりませんでした。</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
            </section>
        </main>
    </div>
</body>

</html>