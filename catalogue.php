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
    </section>

    <!-- <section class="globalPage">
        <article class="Catalogue">
            <h2>Catalogue de sweat à capuche PogoMode :</h2>
            <table>
                <tr>
                    <th>Id_Article</th>
                    <th>Name</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Couleur</th>
                    <th>Détail</th>
                    <th>Param</th>
                </tr>
                <?php
                $result = mysqli_query($mtconn, "SELECT * FROM mt_articles");
                while ($article = mysqli_fetch_assoc($result)) :
                ?>
                    <tr>
                        <td><?php echo $article["id_article"]; ?></td>
                        <td><?php echo $article["name"]; ?></td>
                        <td><?php echo $article["price"]; ?> €</td>
                        <td><?php echo $article["description"]; ?></td>
                        <td><img src="<?php echo $article["view_img"]; ?>" alt=""></td>
                        <td><?php echo $article["color"]; ?></td>
                        <td><a href="detail_article.php?id=<?php echo $article["id_article"]; ?>" class="detail">Voir</a></td>
                        <td>
                            <a href="edit_article.php?id=<?php echo $article["id_article"]; ?>" class="edit" onclick="return confirmUpdate()">Modifier</a>
                            <a href="delete_article.php?id=<?php echo $article["id_article"]; ?>" class="delete" onclick="return confirmDelete()">Supprimer</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <a href="article_add.php" class="actionHover">Ajouter un nouvel article</a>
        </article>
    </section> -->
</body>
</html>
