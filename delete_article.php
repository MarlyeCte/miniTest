<?php include('db_config.php'); ?>

<?php

    if (isset($_GET["id"])) {
        $articleId = $_GET["id"];
        $deleteQuery = "DELETE FROM mt_articles WHERE id_article='$articleId'";
        $result = mysqli_query($mtconn, $deleteQuery);

        if ($result) {
            // Article supprimé avec succès, rediriger ou afficher un message
        } else {
            // Erreur lors de la suppression de l'article, gérer l'erreur
        }
    } else {
        // Gérer le cas où l'ID de l'article n'est pas fourni
    }

    // Rediriger vers la page de catalogue après la suppression
    header("Location: catalogue.php");
    exit();

?>