<?php
    include("../assets/inc/headBack.php");
    if($_SESSION["role"] == null || $_SESSION["role"] !=  1){
        // on envoie un message d'alerte
        $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
        header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
        exit;
    }
    // Choix de l'id utilisateur à afficher
    $id = 6;
    require("../core/connexion.php");

    $sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
            FROM `table_user`
            WHERE `id_user` = $id
            ";

    $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    $user = mysqli_fetch_assoc($query);
?>
<title>Modification de l'utilisateur</title>
<?php
    include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
    <?php
    echo '<pre>';
    var_dump($user);
    echo '</pre>';
    ?>
    </div>
</main>

<?php
    include("../assets/inc/footerBack.php");
?>