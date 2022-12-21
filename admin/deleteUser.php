<?php
include("../assets/inc/headBack.php");
if ($_SESSION["role"] == null || $_SESSION["role"] != 1) {
    // on envoie un message d'alerte
    $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
    header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
    exit;
}
// Choix de l'id utilisateur à afficher
$id = $_GET["id_user"];
require("../core/connexion.php");

$sql = "DELETE FROM `table_user`
            WHERE `id_user` = $id
            ";

$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$_SESSION["message"] = "L'utilisateur a bien été supprimé.";
header('Location: http://localhost/la_manu/sitePhpProcedural/admin/listUsers.php');
?>
<title>Suppression de l'utilisateur</title>
<?php
include("../assets/inc/headerBack.php");
?>

<?php
include("../assets/inc/footerBack.php");
?>