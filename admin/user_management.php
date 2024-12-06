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
    if (!empty($_POST['user_ID']) && is_array($_POST['user_ID'])) {
        try {
            $stmt = $pdo->prepare("DELETE FROM user WHERE user_ID = ?");
            foreach ($_POST['user_ID'] as $user_ID) {
                $stmt->execute([$user_ID]);
            }
        } catch (Exception $e) {
            echo "エラー: " . htmlspecialchars($e->getMessage());
        }
        $success_message = "選択したユーザーが削除されました。";
    } else {
        $error_message = "削除対象のユーザーが選択されていません。";
    }
}

try {
    if (isset($_GET['query'])) {
        $stmt = $pdo->prepare("SELECT * FROM user WHERE name LIKE ?");
        $like = '%' . $_GET['query'] . '%';
        $stmt->execute([$like]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM user");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>ユーザー管理</title>
    <link rel="stylesheet" href="css/styles.css">
    <script>
        function confirmDelete() {
            return confirm("選択したユーザーを本当に削除しますか？");
        }
    </script>
</head>

<body>
    <div class="container">
        <header>
            <img src="images/header_logo.png" alt="博多☆飯店">
            <h1>ユーザー管理</h1>
        </header>
        <main>
            <?php include_once 'util/sidebar.php'; ?>
            <section class="content">
                <form action="#" method="get">
                    <div class="search-bar">
                        <input type="search" name="query" placeholder="名前検索" value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>">
                        <button>🔍</button>
                    </div>
                </form>
                <form action="#" method="post" onsubmit="return confirmDelete();">
                    <button class="delete-button">削除</button>
                    <span style="color: #4fec30; font-weight:bold"><?= $success_message ?></span>
                    <span style="color: red; font-weight:bold"><?= $error_message ?></span>
                    <table>
                        <thead>
                            <tr>
                                <th><input type="checkbox" onclick="toggleAll(this)"></th>
                                <th>ユーザーID</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th>住所</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="user_ID[]" value="<?php echo htmlspecialchars($user['user_ID']); ?>">
                                    </td>
                                    <td><?php echo htmlspecialchars($user['user_ID']); ?></td>
                                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                                    <td><?php echo htmlspecialchars($user['mail']); ?></td>
                                    <td><?php echo htmlspecialchars($user['address']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </section>
        </main>
    </div>

    <script>
        function toggleAll(source) {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (const checkbox of checkboxes) {
                checkbox.checked = source.checked;
            }
        }
    </script>
</body>

</html>