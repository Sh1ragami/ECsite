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
    
  </style>
  <body>
    <div class="app">
      <div class="header"><h1 class="text2">博多☆飯店</h1></div>
      <br><br>
      <div class="text">
        <h3>ID</h3>
      <input type="text" name="id" class="text"><br>
        <h3>パスワード</h3>
      <input type="text" name="passward" class="text">
      <br><br>
        <form action="index2.php" method="post">
          <input type="submit" value="ログイン" name="login" class="login">
        </form>
      </div>
    </div>
  </body>
</html>