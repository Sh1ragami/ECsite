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
      width: 500px;
    background-color: #ffffff;
    box-sizing: border-box;
    border: 20px solid #ffffff;
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
        width:300px;
        height:100px;
      }
      .text2{
        width:125px;
        height:30px;
      }
      .selectbox{
        width:120px;
        height:30px;
      }
      .sidebar2{
      width: 400px;
      background-color: #ffffff;
      box-sizing: border-box;
      border: 20px solid #ffffff;
      }
      .text3{
        width:300px;
        height:70px;
      }
      .submit2{
      height:30px;
      width:80px;
      border-radius: 10px 10px 10px 10px;
      background-color: #ffd900;
      text-align: center;
      }
      .star{
      color:#d4af37;
      text-align: center;
    }
    .h4{
      color:#ffffff;
    }
    
  </style>
  <body>
    <div class="app">
      <div class="header"><h1 class="star">博多☆飯店</h1></div>
      <div class="main">
        <div class="sidebar">
          <form action="index2.php" method="post">
          <button value="send" class="example" name="action">ユーザー管理</button></form>          
          <form action="product.php" method="post">
          <button value="send" class="example2" name="action"><h4 class="h4">商品管理</h4></button></form>
          <form action="product2.php" method="post">
          <button type="sabumit" value="send" class="example">商品登録</button></form>
          <form action="many.php" method="post">
          <button type="submit" value="send" class="example">売上管理</button></form>
          <form action="acaunt.php" method="post">
          <button type="submit" value="send" class="example">アカウント登録</button></form>
          <form action="login.php" method="post">
          <button type="submit" value="send" class="example">ログアウト</button></form>
        </div>


        <div class="content">
          <h3>商品登録</h3>
          <input type="text" name="touroku" class="text"><br><br>
          <h3>金額　　　　　　カテゴリー</h3>
          <input type="text" name="many" class="text2">
          <span>円</span>
          <select name="catgory" id="catgory" class="selectbox">
            <option value="わかめ">わかめ</option>
            <option value="ごま">ごま</option>
          </select><br><br>
          <h3>在庫数　　　　画像アップロード</h3>
          <input type="text" name="number" class="selectbox">
          <span>　</span>
          <input type="file" name="example" accept="image/jpeg, image/png" class="uprod"><br><br>
          <h3>商品説明</h3>
          <input type="text" name="touroku" class="text">
        </div>


         <div class="sidebar2">
          <h3>商品</h3>
          <input type="text" name="maded" class="text3">
          <h3>原材料</h3>
          <input type="text" name="zairyou" class="text3">
          <h3>内容量</h3>
          <input type="text" name="naiyou" class="text3">
          <h3>消費期限</h3>
          <input type="text" name="time" class="text3">
          <h3>保存方法</h3>
          <input type="text" name="hozon" class="text3"><br><br>
          <form action="index2.php" method="post">
            <input type="submit" value="変更" class="submit2">
          </form>
        <div>   
      </div>
    </div>
  </body>
</html>