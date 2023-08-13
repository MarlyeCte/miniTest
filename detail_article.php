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
    <link rel="stylesheet" href="style.css">
    <title>Détails de l'article</title>
</head>

<?php include('navbar.php'); ?>

<body>

    <section class="globalPage">
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
                        <!-- <p class="detail-color">Couleur : <?php echo $article["color"]; ?></p> -->
                    </div>
                </article>
            <?php
            }
            ?>
        </article>
    </section>
</body>
</html>