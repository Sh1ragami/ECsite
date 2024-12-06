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
$commodity = null;

// 商品データの取得（更新時）
if (!empty($_GET['cm_ID'])) {
    $stmt = $pdo->prepare("SELECT * FROM commodity WHERE cm_ID=?");
    $stmt->execute([$_GET['cm_ID']]);
    $commodity = $stmt->fetch(PDO::FETCH_ASSOC);
}

// フォーム送信時の処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (empty($_POST['update'])) {
            // 新規登録の場合
            $stmt = $pdo->prepare("
                INSERT INTO commodity (
                    cm_name, price, category, image, stock, overview, 
                    manufacturer, materials, quantity, `limit`, keep
                ) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([
                $_POST['cm_name'],
                $_POST['price'],
                $_POST['category'],
                $_POST['image'],
                $_POST['stock'],
                $_POST['overview'],
                $_POST['manufacturer'],
                $_POST['materials'],
                $_POST['quantity'],
                $_POST['limit'],
                $_POST['keep']
            ]);
            $success_message = "商品が登録されました。";
        } else {
            // 更新の場合
            $stmt = $pdo->prepare("
                UPDATE commodity 
                SET cm_name=?, price=?, category=?, image=?, stock=?, overview=?, 
                    manufacturer=?, materials=?, quantity=?, `limit`=?, keep=? 
                WHERE cm_ID=?
            ");
            $stmt->execute([
                $_POST['cm_name'],
                $_POST['price'],
                $_POST['category'],
                $_POST['image'],
                $_POST['stock'],
                $_POST['overview'],
                $_POST['manufacturer'],
                $_POST['materials'],
                $_POST['quantity'],
                $_POST['limit'],
                $_POST['keep'],
                $_POST['update']
            ]);
            $success_message = "商品が更新されました。";
        }
    } catch (PDOException $e) {
        $error_message = "エラーが発生しました: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/double_form.css">
</head>

<body>
    <div class="container">
        <header>
            <img src="images/header_logo.png" alt="博多☆飯店">
            <h1>商品管理</h1>
        </header>
        <main>
            <?php include_once 'util/sidebar.php'; ?>
            <?php if ($success_message): ?>
                <div class="success-message"><?= htmlspecialchars($success_message) ?></div>
            <?php endif; ?>
            <?php if ($error_message): ?>
                <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <form action="#" method="POST">
                <input type="hidden" name="update" value="<?= htmlspecialchars($_GET['cm_ID'] ?? '') ?>">
                <div class="form-container">
                    <div class="form-group">
                        <label for="cm_name">商品名</label>
                        <input type="text" id="cm_name" name="cm_name" value="<?= htmlspecialchars($commodity['cm_name'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cm_name">概要</label>
                        <input type="text" id="overview" name="overview" value="<?= htmlspecialchars($commodity['overview'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">金額</label>
                        <input type="number" id="price" name="price" value="<?= htmlspecialchars($commodity['price'] ?? '') ?>" required> 円
                    </div>
                    <div class="form-group">
                        <label for="category">カテゴリー</label>
                        <select id="category" name="category">
                            <option value="和風" <?= isset($commodity['category']) && $commodity['category'] == '和風' ? 'selected' : '' ?>>和風</option>
                            <option value="洋風" <?= isset($commodity['category']) && $commodity['category'] == '洋風' ? 'selected' : '' ?>>洋風</option>
                            <option value="中華" <?= isset($commodity['category']) && $commodity['category'] == '中華' ? 'selected' : '' ?>>中華</option>
                            <option value="その他" <?= isset($commodity['category']) && $commodity['category'] == 'その他' ? 'selected' : '' ?>>その他</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">在庫数</label>
                        <input type="number" id="stock" name="stock" value="<?= htmlspecialchars($commodity['stock'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image">画像URL</label>
                        <input type="text" id="image" name="image" value="<?= htmlspecialchars($commodity['image'] ?? '') ?>" required placeholder="https://...">
                    </div>
                    <div class="form-group">
                        <label for="materials">原材料</label>
                        <textarea id="materials" name="materials" required><?= htmlspecialchars($commodity['materials'] ?? '') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="manufacturer">製造元</label>
                        <textarea id="manufacturer" name="manufacturer" required><?= htmlspecialchars($commodity['manufacturer'] ?? '') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="quantity">内容量</label>
                        <input type="number" id="quantity" name="quantity" value="<?= htmlspecialchars($commodity['quantity'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="limit">消費期限</label>
                        <input type="text" id="limit" name="limit" value="<?= htmlspecialchars($commodity['limit'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="keep">保存方法</label>
                        <textarea id="keep" name="keep" required><?= htmlspecialchars($commodity['keep'] ?? '') ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn">保存</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>

</html>