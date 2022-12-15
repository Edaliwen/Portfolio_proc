<?php
    // configuration de la connexion à la base de données

    // création d'une variable $online avec le type boolean à true
    $online = false;
    if (!$online){
        $host = "localhost";
        $user = "root";
        $password = ""; // pour les mac $password = "root";
        $bdd = "portfolio";
    }else{
        // à remplir avec les données fournies par votre hébergeur
        $host = "localhost";
        $user = "root";
        $password = "";
        $bdd = "portfolio";
    }
    // mise en place de la connexion vers la bdd
    $connexion = mysqli_connect($host, $user, $password, $bdd);
    // passage des retours de requêtes au format d'encodage UTF-8
    mysqli_query($connexion, "SET NAMES 'utf8'");

?>