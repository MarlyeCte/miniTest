<?php

    $mtconn = mysqli_connect('localhost','root','', 'db_mt') or die('Erreur de connection à la base de donnée');

    // echo "Connection réussie";

    // mysqli_query($mtconn,"INSERT INTO `mt_articles`(`description`, `view_img`, `color`) VALUES ('Le Sweat à capuche de PogoMode convient à toute les tailles avec plusieurs couleurs disponibles', 'Catalogue_PogoMode/Sweat_Bleu.png', 'Bleu')");

    $result = mysqli_query($mtconn, "SELECT * FROM mt_articles");

    $tableau = mysqli_fetch_assoc($result);

    // echo $tableau ["id_article"];
    // echo $tableau ["name"];
    // echo $tableau ["price"];
    // echo $tableau ["description"];
    // echo $tableau ["view_img"];
    // echo $tableau ["color"];

?>