<?php include('../db_config.php'); ?>

<?php
if (isset($_GET["id"])) {
    $articleId = $_GET["id"];
    $fetchQuery = "SELECT * FROM mt_articles WHERE id_article='$articleId'";
    $articleResult = mysqli_query($mtconn, $fetchQuery);

    if ($articleResult) {
        $article = mysqli_fetch_assoc($articleResult);

        // Définir les en-têtes pour le contenu JSON
        header("Content-Type: application/json; charset=UTF-8");

        // Convertir l'article en JSON et renvoyer la réponse
        echo json_encode($article, JSON_PRETTY_PRINT);
    } else {
        $errorMessage = "Erreur lors de la récupération des données de l'article.";
    }
} else {
    $errorMessage = "ID de l'article non fourni.";
}
?>
