<?php
    include("../assets/inc/headBack.php")
?>
<title>Console d'administration</title>
<?php
    include("../assets/inc/headerBack.php")
?>
<main>
    <div class="container">
    <?php
    if($_SESSION["role"] == null || $_SESSION["role"] !=  1){
        // on envoie un message d'alerte
        $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
        header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
        exit;
    }else{
        echo '<div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h4>Bienvenue ' . $_SESSION["prenom"] . '</h4>
            </div>
        </div>';
    }
    ?>
    </div>
</main>

<?php
    include("../assets/inc/footerBack.php")
?>