<?php

    try{
        $user_ID = $_POST['user[]'];

        $pdo = new PDO(
            'mysql:host=mysql309.phy.lolipop.lan;
                     dbname=LAA1553893-ecsite;',
            'LAA1553893',
            'universe'
        );

        $sql = $pdo->prepare('DELETE FROM `user` WHERE `user-ID` = ?');
        $result = $sql->execute([$user_ID]);

    } catch (PDOException $e){
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }

        header("Location: g17_user_management_view.php");
        
        ?>