<?php
    // Dans ce fichier on va créer la page de connexion à notre back-office avec le login et le mot de passe
    include("../assets/inc/headFront.php");
?>
<title>Login administrateur</title>
<?php
    // Dans ce fichier on va créer la page de connexion à notre back-office avec le login et le mot de passe
    include("../assets/inc/headerFront.php");
?>
<main>
    <div class="container mt-3">
        <!-- gestion de l'affichage des messages -->
        <div class="row justify-content-center">
            <?php 
                if(!$_SESSION) {
                    unset($_SESSION["message"]);
                }
                if(isset($_SESSION["message"])){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $_SESSION["message"] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    // on efface la clé message une fois qu'elle a été affichée
                    unset($_SESSION["message"]);
                }
            ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <form class ="form-group" action="../core/userController.php" method="post">
                    <input class="form-control mt-3" type="email" name="login" placeholder="Votre email"></input>
                    <input class="form-control mt-3" type="password" name="password" placeholder="Votre mot de passe"></input>
                    <button class="btn btn-outline-warning mt-3" type="submit" name="execute" value="log-admin">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    // Dans ce fichier on va créer la page de connexion à notre back-office avec le login et le mot de passe
    include("../assets/inc/footerFront.php");
?>

