<?php include('db_config.php'); ?>

<?php

// Requête SQL pour récupérer les données de la table mt_articles
$sql = "SELECT * FROM mt_articles";
$result = mysqli_query($mtconn, $sql);

// Vérifier si la requête a réussi
if ($result) {
    // Créer un tableau pour stocker les données
    $articles = array();

    // Parcourir les résultats et ajouter chaque ligne au tableau
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }

    // Définir les en-têtes pour le contenu JSON
    header("Content-Type: application/json; charset=UTF-8");

    // Convertir le tableau en JSON et renvoyer la réponse
    echo json_encode($articles);
} else {
    // En cas d'erreur dans la requête
    echo "Erreur lors de la récupération des données.";
}
?>