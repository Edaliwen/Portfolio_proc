<?php
include("../assets/inc/headBack.php");
if ($_SESSION["role"] == null || $_SESSION["role"] !=  1) {
    // on envoie un message d'alerte
    $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
    header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
    exit;
}
// Choix de l'id utilisateur à afficher
$id = $_GET["id_user"];
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
        <div class="card text-center mt-5">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="http://localhost/la_manu/sitePhpProcedural/admin/listUsers.php"><i class="bi bi-chevron-double-left"> Retour à la liste</i></a>
                    </li>
                </ul>
            </div>
            <div class="card-header fs-3">
                <?= $user["prenom"] . " " . $user["nom"] ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $user["email"] ?></p>
                <?php  
                if($user["role"] == true){
                    echo '<p class="card-text">Administrateur</p>';
                }else{
                    echo '<p class="card-text">Utilisateur</p>';
                }
                ?>
                <p class="card-text"></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
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