<?php
include("../assets/inc/headBack.php");
?>
<title>Console d'administration</title>
<?php
include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
        <?php
        if ($_SESSION["role"] == null || $_SESSION["role"] != 1) {
        // on envoie un message d'alerte
        $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
        header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
        exit;
        } else {*/
        if (!$_SESSION) {
            unset($_SESSION["message"]);
        }
        if (isset($_SESSION["message"])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $_SESSION["message"] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            // on efface la clé message une fois qu'elle a été affichée
            unset($_SESSION["message"]);
        }
        echo '<div class="row justify-content-center">
            <div class="col-8 mt-5">
                <h4 class="text-white">Bienvenue dans la console d\'administration ' . $_SESSION["prenom"] . ' !</h4>
            </div>
        </div>';
        }
        ?>
    </div>
</main>

<?php
include("../assets/inc/footerBack.php");
?>