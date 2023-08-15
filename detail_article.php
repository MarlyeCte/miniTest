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
    <link rel="stylesheet" href="styleCSS/style.css">
    <link rel="stylesheet" href="styleCSS/detail.css">
    <title>Détails de l'article : <?php echo $article["name"]; ?></title>
</head>

<?php include('navbar.php'); ?>

<body>

    <section class="globalPage">
        <h2>Détails de l'article :</h2> 
        <article class="contentAllDetail-Web">
            <div class="deta_imgContent">
                <img src="<?php echo $article["view_img"]; ?>" alt="">
            </div>
            
            <div class="deta_textContentBox">
                <div class="deta_textContent">
                    <p>Id : <?php echo $article["id_article"]; ?></p>
                    <p>Réference : <?php echo $article["name"]; ?></p>
                    <p>Prix : <?php echo $article["price"]; ?>€ ( Euro )</p>
                    <p>Description de l'article : <?php echo $article["description"]; ?></p>
                    <p>Couleur : <?php echo $article["color"]; ?></p>
                </div>

                <div class="btnAction">
                    <a href="edit_article.php?id=<?php echo $article["id_article"]; ?>" class="edit" onclick="return confirmUpdate()">Modifier</a>
                    <a href="delete_article.php?id=<?php echo $article["id_article"]; ?>" class="delete" onclick="return confirmDelete()">Supprimer</a>
                </div>
            </div>
        </article>
    </section>

    <!-- <section class="globalPage">
        <article class="Catalogue">
            <?php
            if (isset($errorMessage)) {
                echo '<div class="error-message">' . $errorMessage . '</div>';
            } else {
            ?>
                <article class="articleDetail">
                    <h2>Détails de l'article :</h2>
                    <div class="detail-image">
                        <img src="<?php echo $article["view_img"]; ?>" alt="Image de l'article" class="detail-img">
                    </div>
                    <div class="detail-info">
                        <h3 class="detail-name"><?php echo $article["name"]; ?> : <?php echo $article["color"]; ?></h3>
                        <p class="detail-price">Prix : <?php echo $article["price"]; ?> €</p>
                        <p class="detail-description">Description : <?php echo $article["description"]; ?></p>
                        <div class="btnAction">
                            <a href="edit_article.php?id=<?php echo $article["id_article"]; ?>" class="edit" onclick="return confirmUpdate()">Modifier</a>
                            <a href="delete_article.php?id=<?php echo $article["id_article"]; ?>" class="delete" onclick="return confirmDelete()">Supprimer</a>
                        </div>
                    </div>
                </article>
            <?php
            }
            ?>
        </article>
    </section> -->
</body>
</html>

<script>
    function confirmDelete() {
        return confirm("Voulez-vous vraiment supprimer cet article ?");
    }

    function confirmUpdate() {
        return confirm("Voulez-vous vraiment mettre à jour cette article ?");
    }
</script>