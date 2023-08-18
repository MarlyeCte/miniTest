<?php include('db_config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCSS/globalStyle.css">
    <link rel="stylesheet" href="styleCSS/catalogue.css">
    <title>Catalogue liste</title>
</head>

<?php include('navbar.php'); ?>

<body>

    <section class="globalPage">
        <h2>Catalogue de sweat à capuche PogoMode :</h2>
        
        <!-- Ajouter un formulaire de recherche -->
        <form class="sreachArticle" method="GET" action="">
            <input type="text" name="search_query" placeholder="Rechercher par couleur, ID ou nom">
            <button type="submit">Rechercher</button>
        </form>

        <article class="boxAllContent">
            <?php
                if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                    $search_query = mysqli_real_escape_string($mtconn, $_GET['search_query']);
                    $query = "SELECT * FROM mt_articles WHERE name LIKE '%$search_query%' OR color LIKE '%$search_query%' OR id_article = '$search_query'";
                } else {
                    $query = "SELECT * FROM mt_articles";
                }
                
                $result = mysqli_query($mtconn, $query);

                while ($article = mysqli_fetch_assoc($result)) :
            ?>
            <article class="boxContent">
                <img src="<?php echo $article["view_img"]; ?>" alt="" class="cat_imgContent">

                <div class="cat_infoContent">
                    <h3>Référence : <?php echo $article["name"]; ?> <?php echo $article["color"]; ?></h3>
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
