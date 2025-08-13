<?php
    $commande = true;
    include_once "header.php";
    include_once "main.php";

    $query = "SELECT idclient FROM client";
    $objstmt = $pdo->prepare($query);
    $objstmt->execute();

    if (isset($_POST["save"])) {
        $idcli= $_POST["inputidcl"];
        $date = $_POST["inputdate"];

        $insert_commande = "INSERT INTO `commande`( `idclient`, `date`) VALUES ('$idcli','$date')";

        $pdo->exec($insert_commande);

        header("location:./commandes.php");
    }

?>


    <h1 class="mt-5">Ajouter une commande</h1>
    <form action="" class="row g-3" method="POST">
        <div class="col-md-6">
            <label for="inputidcl" class="form-label">ID client</label>
            <select required name="inputidcl" class="form-control" id="inputidcl">
                <?php 
                    foreach($objstmt->fetchAll(PDO::FETCH_NUM) as $tab){
                        foreach($tab as $elmt){
                            echo "<option value=".$elmt.">".$elmt."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputdate" class="form-label">date de commande</label>
            <input type="date" name="inputdate" id="inputdate" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" name="save" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
  </div>
</main>

<?php 
    include_once "footer.php";
?>