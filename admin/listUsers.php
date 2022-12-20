<?php
    include("../assets/inc/headBack.php");
?>
<title>Liste des utilisateurs inscrits</title>
<?php
    include("../assets/inc/headerBack.php");
    if($_SESSION["role"] == null || $_SESSION["role"] !=  1){
        // on envoie un message d'alerte
        $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
        header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
        exit;
    }

    require("../core/connexion.php");

    $sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
            FROM `table_user`
            ";

    $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

    $users = mysqli_fetch_all($query, MYSQLI_ASSOC);

    echo '<pre>';
    var_dump($users);
    echo '</pre>';
?>
<main>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-8 mt-5">
            <h4>Bienvenue dans la console d'administration <?=$_SESSION["prenom"] ?></h4>
        </div>
</main>

<?php
    include("../assets/inc/footerBack.php");
?>