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
        <article class="searchContent">
        <form class="searchArticle" id="searchForm">
            <div class="clickItem">
                <select name="trie-article" id="itemSearch" class="itemSearch">
                    <option value="all" data-item="all">Afficher tout les articles</option>
                    <option value="sweat" data-item="Sweat à capuche">Par : Sweat à capuche</option>
                    <option value="t-shirt" data-item="T-shirt">Par : T-shirt</option>
                </select>
                <select name="trie-color" id="itemSearch-color" class="itemSearch">
                    <option value="all" data-item="all">Afficher toute les couleurs</option>
                    <option value="rouge" data-item="Rouge">Rouge</option>
                    <option value="rose" data-item="Rose">Rose</option>
                    <option value="orange" data-item="Orange">Orange</option>
                    <option value="jaune" data-item="Jaune">Jaune</option>
                    <option value="vert" data-item="Vert">Vert</option>
                    <option value="bleu" data-item="Bleu">Bleu</option>
                    <option value="violet" data-item="Violet">Violet</option>
                    <option value="noir" data-item="Noir">Noir</option>
                    <option value="gris" data-item="Gris">Gris</option>
                    <option value="blanc" data-item="Blanc">Blanc</option>
                </select>
            </div>
        </form>


        </article>

        <article class="boxAllContent">
            <?php
                if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                    $search_query = mysqli_real_escape_string($mtconn, $_GET['search_query']);
                    $query = "SELECT * FROM mt_articles WHERE name LIKE '%$search_query%' OR color LIKE '%$search_query%'";
                    // echo '<h4>Pas de résultat pour votre recherche</h4>';
                } else {
                    $query = "SELECT * FROM mt_articles";
                }
                
                $result = mysqli_query($mtconn, $query);

                while ($article = mysqli_fetch_assoc($result)) :
            ?>

            <article class="boxContent" data-name="<?php echo $article["name"] ?>" data-color="<?php echo $article["color"]; ?>">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="searchItem.js"></script>
