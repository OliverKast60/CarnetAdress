<?php
    $commande = true;
    include_once "header.php";
    include_once "main.php";

    $query = "SELECT idclient FROM client";
    $objstmt = $pdo->prepare($query);
    $objstmt->execute();

    if(!empty($_GET["id"])){
        $query = "SELECT * FROM commande WHERE idcommande = :id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["id"=>$_GET["id"]]);
        while($row = $pdostmt->fetch(PDO::FETCH_ASSOC)):

?>


    <h1 class="mt-5">Modifier une commande</h1>
    <form action="" class="row g-3" method="POST">
        <input type="hidden" name="myid" value="<?php echo $row["idcommande"]; ?>"/>
        <div class="col-md-6">
            <label for="inputidclient" class="form-label">ID client</label>
            <select required name="inputidclient" class="form-control" id="inputidclient">
                <?php
                    foreach($objstmt->fetchAll(PDO::FETCH_NUM) as $tab){
                        foreach($tab as $elmt){
                            if($row["idclient"] == $elmt){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                            echo "<option value=".$elmt." ".$selected.">".$elmt."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputdate" class="form-label">date de commande : <span classe=""><strong><?php echo $row["date"]; ?></strong></span></label>
            <input type="date" name="inputdate" id="inputdate" class="form-control" value="">
        </div>
        <div class="col-12">
            <button type="submit" name="save" class="btn btn-primary">Modifier</button>
        </div>
    </form>
  </div>
</main>

<?php 
    endwhile;
    }
    if(!empty($_POST)){
        $query = "UPDATE commande SET idclient=:idclient, date=:date WHERE idcommande = :id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["idclient"=>$_POST["inputidclient"], "date"=>$_POST["inputdate"], "id"=>$_POST["myid"]]);
        header("Location:commandes.php");
    }
    include_once "footer.php";
?>