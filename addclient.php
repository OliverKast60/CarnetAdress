<?php
    $client = true;
    include_once "header.php";
    include_once "main.php";

    if (isset($_POST["save"])) {
        $nom= $_POST["inputnom"];
        $prenom = $_POST["inputprenom"];
        $ville = $_POST["inputville"];
        $telephone = $_POST["inputtel"];

        $insert_client = "INSERT INTO `client`( `nom`, `prenom`, `ville`, `telephone`) VALUES ('$nom','$prenom','$ville','$telephone')";

        $pdo->exec($insert_client);

        header("location:./clients.php");
    }

?>


    <h1 class="mt-5">Ajouter un client</h1>
    <form action="" class="row g-3" method="POST">
        <div class="col-md-4">
            <label for="inputnom" class="form-label">Prenom</label>
            <input type="text" name="inputnom" id="inputnom" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="inputprenom" class="form-label">Nom de famille</label>
            <input type="text" name="inputprenom" id="inputprenom" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="inputville" class="form-label">Ville</label>
            <input type="text" name="inputville" id="inputville" class="form-control" required>
        </div>
        <div class="col-12">
            <label for="inputtel" class="form-label">Telephone</label>
            <input type="text" name="inputtel" id="inputtel" class="form-control" required>
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