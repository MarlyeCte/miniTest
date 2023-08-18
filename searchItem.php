<?php
include('db_config.php');

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = mysqli_real_escape_string($mtconn, $_GET['query']);
    $query = "SELECT * FROM mt_articles WHERE name LIKE '%$search_query%' OR color LIKE '%$search_query%' OR id_article = '$search_query'";
    $result = mysqli_query($mtconn, $query);

    while ($article = mysqli_fetch_assoc($result)) {
        echo '<article class="boxContent">';
        // Afficher les informations de l'article ici
        echo '</article>';
    }
} else {
    // Gérer le cas où la requête de recherche est vide
}
?>
