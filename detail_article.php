<?php include('db_config.php'); ?>

<?php

if (isset($_GET["id"])) {
    $articleId = $_GET["id"];
    $fetchQuery = "SELECT * FROM mt_articles WHERE id_article='$articleId'";
    $articleResult = mysqli_query($mtconn, $fetchQuery);
    $article = mysqli_fetch_assoc($articleResult);
} else {
    // Gérer le cas où l'ID de l'article n'est pas fourni
    $errorMessage = "ID de l'article non fourni.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCSS/globalStyle.css">
    <link rel="stylesheet" href="styleCSS/detail.css">
    <title>Détails de l'article : <?php echo $article["name"]; ?></title>
</head>

<?php include('navbar.php'); ?>

<body>

    <section class="globalPage">
        <h2>Détails de l'article :</h2> 
        <article class="contentAllDetail">
            <div class="deta_imgContent">
                <img src="<?php echo $article["view_img"]; ?>" alt="">
            </div>
            
            <div class="deta_textContentBox">
                <div class="deta_textContent">
                    <p>Id : <span><?php echo $article["id_article"]; ?></span></p>
                    <p>Réference : <span><?php echo $article["name"]; ?></span></p>
                    <p>Prix : <span><?php echo $article["price"]; ?>€</span> ( Euro )</p>
                    <p>Couleur : <span><?php echo $article["color"]; ?></span></p><br>
                    <p>Description de l'article : <br><br><span><?php echo $article["description"]; ?></span></p>
                </div>

                <div class="btnAction">
                    <a href="edit_article.php?id=<?php echo $article["id_article"]; ?>" class="edit" onclick="return confirmUpdate()">Modifier</a>
                    <a href="delete_article.php?id=<?php echo $article["id_article"]; ?>" class="delete" onclick="return confirmDelete()">Supprimer</a>
                    <a href="API REST/api_rest_article.php?id=<?php echo $article["id_article"]; ?>" class="api" onclick="return confirmGoPageApi()" target="_blank">Voir l'API</a>
                </div>
            </div>
        </article>
    </section>

</body>
</html>

<script>
    function confirmDelete() {
        return confirm("Voulez-vous vraiment supprimer cet article ?");
    }

    function confirmUpdate() {
        return confirm("Voulez-vous vraiment mettre à jour cette article ?");
    }

    function confirmGoPageApi() {
        return confirm("Vous allez être redirigé vers l'interface API de l'article <?php echo $article["name"]; ?> <?php echo $article["color"]; ?>.");
    }
</script>