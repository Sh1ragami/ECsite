<!DOCTYPE html>
<html>
  <head>
    <title>博多☆飯店</title>
    <meta charset="UTF-8" />
    <link href="styles.css" rel="stylesheet" />
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


    .flex-content {
    height: 400px;
    flex-grow: 1;
    background-color: #ffffff;
    box-sizing: border-box;
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
    .star{
      background-color: #d4af37;
    }
    .text{
      color:#d4af37;
      text-align: center;
    }
    .h4{
      color:#ffffff;
    }
    .text1{
      height: 30px;
      width:250px;
      border: 2px solid #000000;
      position: relative;
      top:30px;
      left:20px;
    }
    .submit{
      height: 33px;
      width:30px;
      border: 2px solid #000000;
      background-color: #ffffff;
      position: relative;
      top:31px;
      left:14px;
    }
    .fieldset1{
      width: 700px;
      border-radius: 5px 5px 5px 5px;
      position: relative;
      left: 20px;
      top: 82px;
    }
    .select{
      height:15px;
      width:15px;
      position: relative;
      top:2px;
      left:5px;
    }
    .fieldset2{
      width: 700px;
      border-radius: 5px 5px 5px 5px;
      position: relative;
      top:26px;
      left:20px;
    }
    .box{
      width: 45px;
      height: 30px;
      position: relative;
      top:15px;
      left:20px;
    }
    .waku{
      height: 1000cm;
      width: 200mm;
      position: relative;
      top: -70mm;
      border: 1px solid #ffffff;
    }


  </style>
  <body>
    <div class="app">
      <div class="header"><h1 class="text">博多☆飯店</h1></div>
      <div class="main">
        <div class="sidebar">
          <form action="index2.php" method="post">
          <button value="send" class="example2" name="action"><h4 class="h4">ユーザー管理</h4></button></form>          
          <form action="product.php" method="post">
          <button value="send" class="example" name="action">商品管理</button></form>
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
          <div class="flex-content">
            <input typw="text" name="kensaku" class="text1">
            <input type="submit" value="🔍" class="submit">
            <fieldset class="fieldset1">
              <input type="checkbox" class="select">
              　ユーザーID　　　　名前　　　　　メールアドレス　　　　　　　　住所
            </fieldset>
            <input type="submit" value="削除" class="box">
          </div>
          <fieldset class="waku">
            <?php
            //DB召喚

            //関数処理開始(※スペースは極力動かさないで欲しい)
            //ループ処理開始
            echo "<fieldset class='fieldset2'>";
            echo "<input type='checkbox' class='select'>";
            echo "　A123456　　　　山田太郎　　　taro.yamada@example.com　東京都新宿区1－１";
            echo "</fieldset>";
            //ループ処理終了
            ?>
          </fieldset>
        </div>
      </div>
    </div>
  </body>
</html>