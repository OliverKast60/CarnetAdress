<?php
    $article = true;
    include_once "header.php";
    include_once "main.php";

    if (isset($_POST["save"])) {
        $desc= $_POST["inputdesc"];
        $prix = $_POST["inputprix"];

        $insert_article = "INSERT INTO `article`( `description`, `prix_unitaire`) VALUES ('$desc','$prix')";

        $pdo->exec($insert_article);

        header("location:./articles.php");
    }

?>


    <h1 class="mt-5">Ajouter un article</h1>
    <form action="" class="row g-3" method="POST">
        <div class="col-md-6">
            <label for="inputdesc" class="form-label">Description</label>
            <textarea name="inputdesc" id="inputdesc" placeholder="Metrre la description de l'article ici!" class="form-control" required></textarea>
        </div>
        <div class="col-md-6">
            <label for="inputprix" class="form-label">Prix unitaire</label>
            <input type="text" name="inputprix" id="inputprix" class="form-control" required>
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