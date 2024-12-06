<?php
session_start();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once 'util/Database.php';
  $DB = new Database();
  $pdo = $DB->getConnection();

  try {
    $stmt = $pdo->prepare("SELECT * FROM management WHERE ID=? and password=?");
    $stmt->execute([$_POST['ID'], $_POST['password']]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
      $_SESSION['ID'] = $admin['ID'];
      header('Location: user_management.php');
    } else {
      $message = 'ログインに失敗しました。';
    }
  } catch (Exception $e) {
    echo $e;
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/auth.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>博多☆飯店</title>
</head>

<body>
  <header>
    <img src="images/header_logo.png" alt="博多☆飯店">
    <h1>管理者ログイン</h1>
  </header>
  <main>
    <section class="content">
      <form action="#" method="post">
        <label for="ID">ID</label><br>
        <input type="text" name="ID" id="ID" required><br>
        <label for="password">パスワード</label><br>
        <input type="password" name="password" id="password" required><br>
        <button>ログイン</button><br>
        <span style="color: red; font-weight:bold;"><?= $message ?></span>
      </form>
    </section>
  </main>
</body>

</html>