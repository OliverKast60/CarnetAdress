<?php
    $client = true;
    include_once "header.php";
    include_once "main.php";

    if(!empty($_GET["id"])){
        $query = "select * from client where idclient = :id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["id"=>$_GET["id"]]);
        while($row = $pdostmt->fetch(PDO::FETCH_ASSOC)):

?>


    <h1 class="mt-5">Modifier un client</h1>
    <form action="" class="row g-3" method="POST">
        <input type="hidden" name="myid" value="<?php echo $row["idclient"]; ?>"/>
        <div class="col-md-4">
            <label for="inputnom" class="form-label">Prenom</label>
            <input type="text" name="inputnom" id="inputnom" class="form-control" value="<?php echo $row["nom"];?>" required>
        </div>
        <div class="col-md-4">
            <label for="inputprenom" class="form-label">Nom de famille</label>
            <input type="text" name="inputprenom" id="inputprenom" class="form-control" value="<?php echo $row["prenom"];?>" required>
        </div>
        <div class="col-md-4">
            <label for="inputville" class="form-label">Ville</label>
            <input type="text" name="inputville" id="inputville" class="form-control" value="<?php echo $row["ville"];?>" required>
        </div>
        <div class="col-12">
            <label for="inputtel" class="form-label">Telephone</label>
            <input type="text" name="inputtel" id="inputtel" class="form-control" value="<?php echo $row["telephone"];?>" required>
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
        $query = "update client set nom=:nom, prenom=:prenom, ville=:ville, telephone=:telephone where idclient = :id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["nom"=>$_POST["inputnom"], "prenom"=>$_POST["inputprenom"], "ville"=>$_POST["inputville"], "telephone"=>$_POST["inputtel"], "id"=>$_POST["myid"]]);
        header("Location:clients.php");
    }
    include_once "footer.php";
?>