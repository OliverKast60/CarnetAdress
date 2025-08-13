<?php
    include_once "main.php";

    if(!empty($_GET["id"])){
        $query = "delete from client where idclient=:id";
        $objstmt = $pdo->prepare($query);
        $objstmt->execute(["id"=>$_GET["id"]]);
        $objstmt->closeCursor();
        header("Location: clients.php");
    }

    if(!empty($_GET["idarticle"])){
        $query = "delete from article where idarticle=:idarticle";
        $objstmt = $pdo->prepare($query);
        $objstmt->execute(["idarticle"=>$_GET["idarticle"]]);
        $objstmt->closeCursor();
        header("Location: articles.php");
    }

    if(!empty($_GET["idcmd"])){
        $query = "DELETE FROM commande WHERE idcommande=:id";
        $objstmt = $pdo->prepare($query);
        $objstmt->execute(["id"=>$_GET["idcmd"]]);
        $objstmt->closeCursor();
        header("Location: commandes.php");
    }
