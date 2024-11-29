<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>博多☆飯店</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    }

    .app {
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    }

    .header {
    text-align: center;
    padding: 25px;
    background-color: #4E5D69;
    border-radius: 10px 10px 0 0;
    border-bottom: 5px solid #d4af37;
    }

    .main {
    display: flex;
    flex-direction: row;
    flex-grow: 1;
    }

    .sidebar {
    width: 130px;
    background-color: #ffffff;
    box-sizing: border-box;
    border: 3px solid #000000;
    }

    .content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    }

    .flex-content {
    height: 400px;
    flex-grow: 1;
    background-color: #ffffff;
    box-sizing: border-box;
    }

    .fixed-content {
    height: 128px;
    background-color: thistle;
    box-sizing: border-box;
    border: 8px solid darkmagenta;
    }
    .example{
    width: 100%;
    padding: 10%;
    box-sizing: border-box;
    border: 1px solid #000000;
    background: #ffffff;
    cursor: pointer;
    }
    .example2{
        width: 100%;
        padding: 10%;
        box-sizing: border-box;
        border: 1px solid #ffffff;
        background:#4E5D69;
        cursor:pointer;
    }
    .text{
      height:30px;
      text-align: center;
    }
    .login{
      height:30px;
      width:80px;
      border-radius: 10px 10px 10px 10px;
      background-color: #ffd900;
    }
    .text2{
      color:#d4af37;
      text-align: center;
    }
    .h4{
      color:#ffffff;
    }
    
  </style>
  <body>
    <div class="app">
      <div class="header"><h1 class="text2">博多☆飯店</h1></div>
      <div class="main">
        <div class="sidebar">
          <form action="index2.php" method="post">
          <button value="send" class="example" name="action">ユーザー管理</button></form>          
          <form action="product.php" method="post">
          <button value="send" class="example" name="action">商品管理</button></form>
          <form action="product2.php" method="post">
          <button type="sabumit" value="send" class="example">商品登録</button></form>
          <form action="many.php" method="post">
          <button type="submit" value="send" class="example">売上管理</button></form>
          <form action="acaunt.php" method="post">
          <button type="submit" value="send" class="example2"><h4 class="h4">アカウント登録</h4></button></form>
          <form action="login.php" method="post">
          <button type="submit" value="send" class="example">ログアウト</button></form>
        </div>
        <div class="content">
        <div class="text"><br>
        <h3>ID</h3>
      <input type="text" name="id" class="text"><br>
        <h3>パスワード</h3>
      <input type="text" name="passward" class="text">
        <h3>パスワード確認</h3>
      <input type="text" name="passward2" class="text">
      <br><br>
        <form action="index2.php" method="post">
          <input type="submit" value="登録" name="login" class="login">
        </form>
      </div>
        </div>
      </div>
    </div>
  </body>
</html>