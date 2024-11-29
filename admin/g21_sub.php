<?php

    try{
        $name = $_POST['name'];
        $kingaku = $_POST['kingaku'];
        $kate = $_POST['kate'];
        $zaiko = $_POST['zaiko'];
        $setumei = $_POST['setumei'];
        $moto = $_POST['moto'];
        $genzai = $_POST['genzai'];
        $naiyou = $_POST['naiyou'];
        $kigen = $_POST['kigen'];
        $hozon = $_POST['hozon'];

        $id = $_SESSION['id'];

        $pdo = new PDO(
            'mysql:host=mysql309.phy.lolipop.lan;
                     dbname=LAA1553893-ecsite;',
            'LAA1553893',
            'universe'
        );

        $sql = $pdo->prepare('UPDATE `commodity` SET `cm-name` = ?,`price` = ?,`category` = ?,`stock` = ?,`overview` = ?,`manufacturer` = ?,`materials` = ?,`quantity` = ?,`limit` = ?,`keep` = ? WHERE `commodity`.`cm-ID` = ? ');
        $result = $sql->execute([$name,$kingaku,$kate,$zaiko,$setumei,$moto,$genzai,$naiyou,$kigen,$hozon,$id]);

    } catch (PDOException $e){
        exit('データベースに接続できませんでした。' . $e->getMessage());
    }

        header("Location: g20_product_register_view.php");
        
        ?>