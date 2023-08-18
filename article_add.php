<?php include('db_config.php'); ?>

<?php

// Récupérer les données existantes pour les options du formulaire
$imageDirectory = 'Sweat_PogoMode/';
$imageFiles = array_diff(scandir($imageDirectory), array('..', '.'));

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $viewImg = $_POST["view_img"];
    $color = $_POST["color"];

    $insertQuery = "INSERT INTO `mt_articles`(`name`, `price`, `description`, `view_img`, `color`) VALUES ('$name', '$price', '$description', '$viewImg', '$color')";
    $result = mysqli_query($mtconn, $insertQuery);

    if ($result) {
        // Article ajouté avec succès, rediriger ou afficher un message
    } else {
        // Erreur lors de l'ajout de l'article, gérer l'erreur
    }
}

// Récupérer les produits existants
$existingProductsQuery = "SELECT * FROM mt_articles";
$existingProductsResult = mysqli_query($mtconn, $existingProductsQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCSS/globalStyle.css">
    <link rel="stylesheet" href="styleCSS/add.css">
    <title>Ajouter un article</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <section class="globalPage">
        <article class="CatalogueAdd">
            <article class="articleAdd">
                <h2>Ajouter un nouvel article :</h2>
                <form action="article_add.php" method="post">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" required><br>

                    <label for="price">Prix :</label>
                    <input type="number" name="price" step="0.01" required><br>
                    
                    <label for="description">Description :</label>
                    <textarea name="description" required></textarea><br>
                    
                    <label for="view_img">Image :</label>
                    <select name="view_img" required onchange="previewImage(this)">
                        <option value="">Sélectionnez une image</option>
                        <?php foreach ($imageFiles as $imageFile) : ?>
                            <option value="<?php echo $imageDirectory . $imageFile; ?>"><?php echo $imageFile; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="image-preview">
                        <h3>Aperçu :</h3>
                        <img id="previewImageElement" src="" alt="">
                    </div>
                    <br>
                    
                    <label for="color">Couleur :</label>
                    <input type="text" name="color" required><br>
                    
                    <button type="submit" name="create" class="actionHover">Ajouter cette article</button>
                </form>
            </article>

            <article class="articleExistant">
                <h2>Articles existants :</h2>
                <div class="articleTable">
                    <table>
                        <tr>
                            <th>Id_Article</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>Images</th>
                            <th>Couleur</th>
                        </tr>
                        <?php while ($existingArticle = mysqli_fetch_assoc($existingProductsResult)) : ?>
                            <tr>
                                <td><?php echo $existingArticle["id_article"]; ?></td>
                                <td><?php echo $existingArticle["name"]; ?></td>
                                <td><?php echo $existingArticle["price"]; ?></td>
                                <td><?php echo $existingArticle["description"]; ?></td>
                                <td><img src="<?php echo $existingArticle["view_img"]; ?>" alt=""></td>
                                <td><?php echo $existingArticle["color"]; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </article>
        </article>
    </section>

    <script>
        function previewImage(selectElement) {
            var preview = document.getElementById("previewImageElement");
            var selectedValue = selectElement.value;

            if (selectedValue) {
                preview.src = selectedValue;
            } else {
                preview.src = "";
            }
        }
    </script>
</body>
</html>