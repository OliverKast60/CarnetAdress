<?php
    $article = true;
    include_once "header.php";
    include_once "main.php";

    if(!empty($_GET["id"])){
        $query = "select * from article where idarticle = :id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["id"=>$_GET["id"]]);
        while($row = $pdostmt->fetch(PDO::FETCH_ASSOC)):

?>


    <h1 class="mt-5">Modifier un article</h1>
    <form action="" class="row g-3" method="POST">
        <input type="hidden" name="myid" value="<?php echo $row["idarticle"]; ?>"/>
        <div class="col-md-6">
            <label for="inputdesc" class="form-label">Description</label>
            <textarea name="inputdesc" id="inputdesc" placeholder="Metrre la description de l'article ici!" class="form-control" required><?php echo $row["description"];?></textarea>
        </div>
        <div class="col-md-6">
            <label for="inputprix" class="form-label">Prix unitaire</label>
            <input type="text" name="inputprix" id="inputprix" class="form-control" value="<?php echo $row["prix_unitaire"];?>" required>
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
        $query = "UPDATE article SET description=:description, prix_unitaire=:prix_unitaire WHERE idarticle = :id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["description"=>$_POST["inputdesc"], "prix_unitaire"=>$_POST["inputprix"], "id"=>$_POST["myid"]]);
        header("Location:articles.php");
    }
    include_once "footer.php";
?>