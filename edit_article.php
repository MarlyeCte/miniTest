<?php include('db_config.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $articleId = $_POST["article_id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $viewImg = $_POST["view_img"];
    $color = $_POST["color"];

    $updateQuery = "UPDATE mt_articles SET name='$name', price='$price', description='$description', view_img='$viewImg', color='$color' WHERE id_article='$articleId'";
    $result = mysqli_query($mtconn, $updateQuery);

    if ($result) {
        header("Location: catalogue.php?success=Article mis à jour avec succès.");
        exit();
    } else {
        header("Location: catalogue.php?error=Erreur lors de la mise à jour de l'article.");
        exit();
    }
}

if (isset($_GET["id"])) {
    $articleId = $_GET["id"];
    $fetchQuery = "SELECT * FROM mt_articles WHERE id_article='$articleId'";
    $articleResult = mysqli_query($mtconn, $fetchQuery);
    $article = mysqli_fetch_assoc($articleResult);
} else {
    header("Location: catalogue.php?error=ID de l'article non fourni.");
    exit();
}

$imageDirectory = 'Sweat_PogoMode/';
$imageFiles = array_diff(scandir($imageDirectory), array('..', '.'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCSS/style.css">
    <link rel="stylesheet" href="styleCSS/edit.css">
    <title>Modifier un article</title>
</head>

<?php include('navbar.php'); ?>

<body>

    <section class="globalPage">
        <article class="Catalogue">
            <article class="articleEdit">
                <h2>Modifier l'article :</h2>
                <form action="edit_article.php" method="post">
                    <input type="hidden" name="article_id" value="<?php echo $articleId; ?>">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" value="<?php echo $article["name"]; ?>" required><br>

                    <label for="price">Prix :</label>
                    <input type="text" name="price" value="<?php echo $article["price"]; ?>" required><br>

                    <label for="description">Description :</label>
                    <textarea name="description" required><?php echo $article["description"]; ?></textarea><br>

                    <label for="view_img">Image actuel :</label>
                    <div class="image-preview">
                        <img src="<?php echo $article["view_img"]; ?>" alt="">
                    </div>

                    <label for="view_img">Changer d'image :</label>
                    <select name="view_img" required onchange="previewImage(this)">
                        <option value="">Sélectionnez une image</option>
                        <?php foreach ($imageFiles as $imageFile) : ?>
                            <option value="<?php echo $imageDirectory . $imageFile; ?>"><?php echo $imageFile; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="preview_img">Aperçu de l'image :</label>
                    <div class="image-preview">
                        <img id="previewImageElement" src="" alt="">
                    </div>

                    <label for="color">Couleur :</label>
                    <input type="text" name="color" value="<?php echo $article["color"]; ?>" required><br>

                    <button type="submit" name="update" class="actionHover" onclick="return confirmUpdate()">Mettre à jour</button>
                </form>
            </article>
        </article>
    </section>
</body>
</html>

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

    function confirmUpdate() {
        return confirm("Voulez-vous vraiment mettre à jour cette article ?");
    }
</script>
