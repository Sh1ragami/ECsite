<?php

    try{
        $id = $_POST['id'];
        $pass = $_POST['pass'];

        $pdo = new PDO(
            'mysql:host=mysql309.phy.lolipop.lan;
                     dbname=LAA1553893-ecsite;',
            'LAA1553893',
            'universe'
        );

        $sql = $pdo->prepare('INSERT INTO `management` (`ID`,`password`) VALUES ( ? , ? )');
        $result = $sql->execute([$id, $pass]);

    } catch (PDOException $e){
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }

        header("Location: g18_admin_register_view.php");
        
        ?>