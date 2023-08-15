<?php include('db_config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCSS/style.css">
    <link rel="stylesheet" href="styleCSS/catalogue.css">
    <title>Catalogue liste</title>
</head>

<?php include('navbar.php'); ?>

<body>

    <section class="globalPage">
        <h2>Catalogue de sweat à capuche PogoMode :</h2>
        <article class="boxAllContent">
            <?php
                $result = mysqli_query($mtconn, "SELECT * FROM mt_articles");
                while ($article = mysqli_fetch_assoc($result)) :
            ?>
            <article class="boxContent">
                <img src="<?php echo $article["view_img"]; ?>" alt="" class="cat_imgContent">

                <div class="cat_infoContent">
                    <h3>Réference : <?php echo $article["name"]; ?></h3>
                    <h3>Prix : <?php echo $article["price"]; ?>€ ( Euro )</h3>
                </div>

                <a href="detail_article.php?id=<?php echo $article["id_article"]; ?>" class="cat_detail">- Voir l'article -</a>
            </article>
            <?php endwhile; ?>
        </article>
        <a href="article_add.php" class="actionHover">Ajouter un nouvel article</a>
    </section>

</body>
</html>
